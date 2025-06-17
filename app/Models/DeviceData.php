<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceData extends Model
{
    
protected $fillable=['dev_id','lati','longi','ph','ec','tds','tur','temp'];

    public function device()
    {
        return $this->belongsTo(Device::class, 'id');
    }
}
