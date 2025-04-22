<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class StoreRentPaymentRequest extends FormRequest
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
            'tenant_id' => 'required|integer|exists:tenants,id',
            'tenant_room_id' => 'required|integer|exists:rooms,id',
            'payment_date' => 'required|date',
            'payment_billing_period_start' => 'required|date_format:Y-m',
            'payment_billing_period_end' => 'required|date_format:Y-m|after_or_equal:payment_billing_period_start',
            'payment_amount' => 'required|integer|min:1',
            'payment_type' => 'required|string|in:Cash,GCash,Maya,Others',
            'payment_reference_number' => 'nullable|string|max:255',
            'payment_status' => 'required|string|in:Paid,Overdue,Pending',
            'payment_receipt_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'payment_due_date' => ['required','date',
                function ($attribute, $value, $fail) {
                    if (date('Y-m', strtotime($value)) !== date('Y-m', strtotime($this->payment_billing_period_end))) {
                        $fail('The payment due date must be in the same month and year as the payment billing period end.');
                    }
                },
            ],          
            'payment_note' => 'nullable|string|max:1000',
            'payment_collected_by_id' => 'nullable|integer|exists:users,id',
        ];
        // 'tenant_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    }

    protected function failedValidation(Validator $validator)
    {
        // Dump validation errors for debugging
        dd($validator->errors()->all());

        // If you want to log errors instead of dumping:
        // \Log::debug('Validation Errors:', $validator->errors()->all());

        throw (new ValidationException($validator))
            ->errorBag($this->errorBag);
    }

}
