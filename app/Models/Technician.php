<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{
    use HasFactory;

    //*trae la info del user que esta relacionado ocn el tecnico
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //*relacion uno a muchos
    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
