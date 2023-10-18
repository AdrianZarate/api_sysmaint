<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'brand',
        'model',
        'serial_number',
        'purchase_date',
        'location',
        'physical_state',
        'status_description',
        'technical_specifications',
        'installation_date',
        'garantia',
        'accessories',
        'current_value',
        'imagen',
    ];

    //* Relacion muchos a muchos
    public function clients()
    {
        return $this->belongsToMany('App/Models/Client');
    }
}
