<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_date',
        'service_type',
        'service_description',
        'equipment_status',
        'replaced_parts',
        'service_cost',
        'service_time',
        'remarks',
        'imagen',
    ];

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
