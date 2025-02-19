<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTenantRequest;
use App\Http\Requests\UpdateTenantProfileRequest;
use App\Http\Requests\UpdateTenantSettingRequest;
use App\Models\Tenant;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenants = Tenant::with('room')->get();

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
        $imageFile = null;

        // Check if a file was uploaded
        if ($request->hasFile('tenant_image') && $request->file('tenant_image')->isValid()) {
            // Get the file from the request
            $imageFile = $request->file('tenant_image');

            // Generate a unique file name based on current timestamp
            $fileName = time() . '.' . $imageFile->getClientOriginalExtension();

            // Store the file in the 'images' directory in the public disk
            $filePath = $imageFile->storeAs('images', $fileName, 'public');
        }

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
                'tenant_image' => $imageFile ? Storage::url($filePath) : null,
                'tenant_note' => $request->tenant_note,
                'tenant_room_id' => $request->tenant_room_id,
                'tenant_account_enable' => false,
                'tenant_account_bill_notif' => false,
                'tenant_account_password' => ''
            ]);

            return redirect()->route('admin.tenants.index')->with([
                'success' => 'Tenant added successfully'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Tenant $tenant)
    {
        $tenants = Tenant::with('room')->get();
        $roomData = Room::all(); // Fetch all rooms from the rooms table
        return view('admin.tenants.show')->with([
            'tenant' => $tenant,
            'roomData' => $roomData
        ]);
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
    public function updateProfile(UpdateTenantProfileRequest $request, Tenant $tenant)
    {
        $imageFile = null;
        $filePath = null;
        
        // Retain existing image by default
        $tenantImage = $tenant->tenant_image;
    
        // Check if a file was uploaded
        if ($request->hasFile('tenant_image') && $request->file('tenant_image')->isValid()) {
            // Delete old image if it exists
            if ($tenant->tenant_image) {
                Storage::delete(str_replace('/storage/', 'public/', $tenant->tenant_image));
            }
            // Get the file from the request
            $imageFile = $request->file('tenant_image');
            // Generate a unique file name based on current timestamp
            $fileName = time() . '.' . $imageFile->getClientOriginalExtension();
            // Store the file in the 'images' directory in the public disk
            $filePath = $imageFile->storeAs('images', $fileName, 'public');
            // Store new image path
            $tenantImage = Storage::url($filePath);
        }

    
        // Check if the remove_image input is set to "1"
        if ($request->remove_image == "1") {
            if ($tenant->tenant_image) {
                Storage::delete(str_replace('/storage/', 'public/', $tenant->tenant_image));
            }
            $tenantImage = null;
        }
    
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
                'tenant_image' => $tenantImage,
                'tenant_note' => $request->tenant_note,
                'tenant_room_id' => $request->tenant_room_id,
                'tenant_account_enable' => true,
                'tenant_account_bill_notif' => false,
                'tenant_account_password' => ''
            ]);

        return redirect()->route('admin.tenants.show', $tenant->id)->with([
            'success' => 'Tenant updated successfully'
        ]);
    }

    }

    public function updateSetting(UpdateTenantSettingRequest $request, Tenant $tenant)
    {
        if ($request->validated()) {
            $tenant->update([
                'tenant_account_enable' => $request->tenant_account_enable,
                'tenant_account_bill_notif' => $request->tenant_account_bill_notif
            ]);
        }

        return redirect()->route('admin.tenants.show', $tenant->id)->with([
            'success' => 'Tenant updated successfully'
        ]);
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
