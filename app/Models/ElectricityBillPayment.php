<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectricityBillPayment extends Model
{
    use HasFactory;

    protected $table = 'electricity_bill_payments';

    protected $fillable = [
        'tenant_id',
        'tenant_room_id',
        'payment_date',
        'payment_billing_period_start',
        'payment_billing_period_end',
        'payment_previous_kwh',
        'payment_current_kwh',
        'payment_amount',
        'payment_type',
        'payment_reference_number',
        'payment_receipt_url',
        'payment_status',
        'payment_due_date',
        'payment_note',
        'payment_collected_by_id',
    ];

    protected $casts = [
        'payment_date' => 'date',
        'payment_due_date' => 'date',
        'payment_previous_kwh' => 'integer',
        'payment_current_kwh' => 'integer',
        'payment_amount' => 'integer'
    ];

    // Relationships
    public function tenant()
    {
        return $this->belongsTo(Tenant::class, 'tenant_id', 'id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'tenant_room_id', 'id');
    }

    public function collectedBy()
    {
        return $this->belongsTo(User::class, 'payment_collected_by_id', 'id');
    }
}