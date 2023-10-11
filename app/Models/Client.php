<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    //*trae la info del user que esta relacionado con el cliente
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //*Relacion muchos a muchos
    public function decives()
    {
        return $this->belongsToMany(Device::class);
    }
}
