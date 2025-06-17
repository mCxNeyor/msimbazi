<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use function Livewire\on;

class Device extends Model
{
    protected $fillable=['imei','lati', 'longi', 'location'];

    public function deviceData()
    {
        return $this->hasMany(DeviceData::class, 'dev_id');
    }

    public function latestData()
    {
        return $this->hasOne(DeviceData::class, 'dev_id')->latest();
    }
    
}
