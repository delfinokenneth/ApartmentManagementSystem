<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['room_name', 'room_rate'];

    public function tenants()
    {
        return $this->hasMany(Tenant::class, 'tenant_room_id', 'id');
    }
}
