<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    //* Relacion muchos a muchos
    public function clients()
    {
        return $this->belongsToMany('App/Models/Client');
    }
}
