<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    
    //*relacion uno a muchos
    public function technician()
    {
        return $this->belongsTo(Technician::class);
    }

    public function clientDevice()
    {
        return $this->belongsTo(ClientDevice::class);
    }
}
