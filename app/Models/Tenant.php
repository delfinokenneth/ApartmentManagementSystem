<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_name',
        'tenant_contact',
        'tenant_email',
        'tenant_marital_status',
        'tenant_birth_date',
        'tenant_address',
        'tenant_employer',
        'tenant_emergency_contact',
        'tenant_facebook_link',
        'tenant_image',
        'tenant_note',
        'tenant_room_id',
        'tenant_account_enable',
        'tenant_account_bill_notif',
        'tenant_account_password'
    ];

}
