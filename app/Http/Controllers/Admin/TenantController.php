<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTenantRequest;
use App\Http\Requests\UpdateTenantRequest;
use App\Models\Tenant;
use App\Models\Room;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tenants = Tenant::latest()->get();
        return view('admin.tenants.index')->with([
            'tenants' => $tenants
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $roomData = Room::all();
        return view('admin.tenants.create', compact('roomData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTenantRequest $request)
    {
        //
        if ($request->validated()) {
            Tenant::create([
                'tenant_name' => $request->tenant_name,
                'tenant_contact' => $request->tenant_contact,
                'tenant_email' => $request->tenant_email,
                'tenant_marital_status' => $request->tenant_marital_status,
                'tenant_birth_date' => $request->tenant_birth_date,
                'tenant_address' => $request->tenant_address,
                'tenant_employer' => $request->tenant_employer,
                'tenant_emergency_contact' => $request->tenant_emergency_contact,
                'tenant_facebook_link' => $request->tenant_facebook_link,
                'tenant_image' => $request->tenant_image,
                'tenant_note' => $request->tenant_note,
                'tenant_room_id' => $request->tenant_room_id,
                'tenant_account_enable' => $request->tenant_account_enable,
                'tenant_account_bill_notif' => $request->tenant_account_bill_notif,
                'tenant_account_password' => $request->tenant_account_password


            ]);

            return redirect()->route('admin.tenant.index')->with([
                'success' => 'Tenant added successfully'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Tenant $tenant)
    {
        //
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tenant $tenant)
    {
        //
        return view('admin.tenants.edit')->with([
            'tenant' => $tenant
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTenantRequest $request, Tenant $tenant)
    {
        //
        if ($request->validated()) {
            $tenant->update([
                'tenant_name' => $request->tenant_name,
                'tenant_contact' => $request->tenant_contact,
                'tenant_email' => $request->tenant_email,
                'tenant_marital_status' => $request->tenant_marital_status,
                'tenant_birth_date' => $request->tenant_birth_date,
                'tenant_address' => $request->tenant_address,
                'tenant_employer' => $request->tenant_employer,
                'tenant_emergency_contact' => $request->tenant_emergency_contact,
                'tenant_facebook_link' => $request->tenant_facebook_link,
                'tenant_image' => $request->tenant_image,
                'tenant_note' => $request->tenant_note,
                'tenant_room_id' => $request->tenant_room_id,
                'tenant_account_enable' => $request->tenant_account_enable,
                'tenant_account_bill_notif' => $request->tenant_account_bill_notif,
                'tenant_account_password' => $request->tenant_account_password


            ]);

            return redirect()->route('admin.tenant.index')->with([
                'success' => 'Tenant updated successfully'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant)
    {
        //
        $tenant->delete();

        return redirect()->route('admin.tenants.index')->with([
            'success' => 'Tenant deleted successfully'
        ]);

    }
}
