<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class StoreTenantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tenant_name' => 'required|string|unique:tenants,tenant_name|max:255',
            'tenant_contact' => 'required|string|unique:tenants,tenant_contact|regex:/^\+?[0-9]{10,15}$/',
            'tenant_email' => 'required|string|email|unique:tenants,tenant_email|max:255',
            'tenant_marital_status' => 'required|string|in:Single,Married,Divorced,Widowed',
            'tenant_birth_date' => 'required|date|before_or_equal:' . now()->subYears(18)->format('Y-m-d'),
            'tenant_address' => 'required|string|max:500',   
            'tenant_employer' => 'nullable|string|max:255',
            'tenant_emergency_contact' => 'required|string|max:50',
            'tenant_facebook_link' => 'nullable|string|url|max:255',
            'tenant_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tenant_room_id' => 'required|integer|exists:rooms,id|unique:tenants,tenant_room_id',
            'tenant_note' => 'nullable|string|max:1000',
        ];
    }
}
