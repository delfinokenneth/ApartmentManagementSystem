<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreRentPaymentRequest;
use App\Http\Controllers\Controller;
use App\Models\RentPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Tenant;
use App\Models\Room;

class RentPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenants = Tenant::with('room')->get();

        return view('admin.payments.index')->with([
            'tenants' => $tenants
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Tenant $tenant)
    {
        $tenants = Tenant::with('room')->get();
        $roomData = Room::all(); // Fetch all rooms from the rooms table

        return view('admin.payments.rentpayments.create')->with([
            'tenant' => $tenant,
            'roomData' => $roomData
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRentPaymentRequest $request)
    {
        $imageFile = null;

        // Check if a file was uploaded
        if ($request->hasFile('payment_receipt_url') && $request->file('payment_receipt_url')->isValid()) {
            // Get the file from the request
            $imageFile = $request->file('payment_receipt_url');

            // Generate a unique file name based on current timestamp
            $fileName = time() . '.' . $imageFile->getClientOriginalExtension();

            // Store the file in the 'images' directory in the public disk
            $filePath = $imageFile->storeAs('images/rentpayments', $fileName, 'public');
        }

        if ($request->validated()) {
            RentPayment::create([
                'tenant_id' => $request->tenant_id,
                'tenant_room_id' => $request->tenant_room_id,
                'payment_date' => $request->payment_date,
                'payment_billing_period_start' => $request->payment_billing_period_start,
                'payment_billing_period_end' => $request->payment_billing_period_end,
                'payment_amount' => $request->payment_amount,
                'payment_type' => $request->payment_type,
                'payment_reference_number' => $request->payment_reference_number,
                'payment_receipt_url' => $imageFile ? Storage::url($filePath) : null,
                'payment_status' => $request->payment_status,
                'payment_due_date' => $request->payment_due_date,
                'payment_note' => $request->payment_note,
                'payment_collected_by_id' => $request->payment_collected_by_id,
            ]);

            return redirect()->route('admin.rentpayments.index')->with([
                'success' => 'Rent Payment added successfully'
            ]);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(RentPayment $rentPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RentPayment $rentPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RentPayment $rentPayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RentPayment $rentPayment)
    {
        //
    }
}
