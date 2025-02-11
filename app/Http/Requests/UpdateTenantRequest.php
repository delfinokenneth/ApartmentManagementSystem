<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTenantRequest extends FormRequest
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
            'tenant_room_id' => ['required','integer','exists:rooms,id',Rule::unique('tenants', 'tenant_room_id')->ignore($this->route('tenant')->id ?? null)],
            'tenant_name' => ['required', 'string', 'max:255', Rule::unique('tenants')->ignore($this->route('tenant')->id ?? null)],
            'tenant_contact' => ['required','string','regex:/^\+?[0-9]{10,15}$/',Rule::unique('tenants', 'tenant_contact')->ignore($this->route('tenant')->id ?? null)],
            'tenant_email' => ['required','string','email','max:255',Rule::unique('tenants', 'tenant_email')->ignore($this->route('tenant')->id ?? null)],        
            'tenant_marital_status' => 'required|string|in:Single,Married,Divorced,Widowed',
            'tenant_birth_date' => 'required|date|before_or_equal:' . now()->subYears(18)->format('Y-m-d'),
            'tenant_address' => 'required|string|max:500',   
            'tenant_employer' => 'nullable|string|max:255',
            'tenant_emergency_contact' => 'required|string|max:50',
            'tenant_facebook_link' => 'nullable|string|url|max:255',
            'tenant_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'remove_image' => 'nullable|in:0,1',
            'tenant_note' => 'nullable|string|max:1000',
        ];
    }
}
