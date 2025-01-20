<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTenantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tenant_name' => 'required|string|max:255|unique:tenants,tenant_name,'.$this->tenant->id,
            'tenant_contact' => 'required|string|unique:tenants,tenant_contact|max:20',
            'tenant_email' => 'required|string|email|unique:tenants,tenant_email|max:255',
            'tenant_marital_status' => 'required|string|in:single,married,divorced,widowed',
            'tenant_birth_date' => 'required|date|before:today',
            'tenant_address' => 'required|string|max:500',
            'tenant_employer' => 'nullable|string|max:255',
            'tenant_emergency_contact' => 'required|string|max:20',
            'tenant_facebook_link' => 'nullable|string|url|max:255',
            'tenant_image' => 'nullable|string|max:255', // Assuming it's a path or URL
            'tenant_note' => 'nullable|string',
            'tenant_room_id' => 'required|string|max:50',
            'tenant_account_enable' => 'required|boolean',
            'tenant_account_bill_notif' => 'required|boolean',
            'tenant_account_password' => 'required|string|min:8|max:255' // Ensure password is securely hashed before storing
        ];
    }
}
