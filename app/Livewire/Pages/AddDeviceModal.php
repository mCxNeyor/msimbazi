<?php

namespace App\Livewire\Pages;

use App\Models\Device;
use Livewire\Component;

class AddDeviceModal extends Component
{
    
    public $latitude,$imei,$longitude,$location;

    public function render()
    {
        return view('livewire.pages.add-device-modal');
    }

    public function store(){

       
        $this->validate([
            "imei"=>'unique:devices,imei',
            "latitude"=>'string',
            "longitude"=>'string',
            "location"=>'string'

        ]);
// dd($this->imei);
         $post=Device::create([
         "imei"=>$this->imei,
         "lati"=>$this->latitude,
         "longi"=>$this->longitude,
         "location"=>$this->location
        ])->save();

        return redirect('/')->with('success', 'Device registered successfully!');
          
    }

}
