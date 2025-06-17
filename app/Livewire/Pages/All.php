<?php

namespace App\Livewire\Pages;

use App\Models\Device;
use App\Models\DeviceData;
use Livewire\Component;

class All extends Component
{
    public $devices,$id,$name;

    public function render()
    {
        return view('livewire.pages.all')->layout('layouts.app');
    }

    public function mount($id){
     $this->name=Device::where('id',$id)->first();
     $this->devices = DeviceData::where('dev_id', $id)
     ->orderBy('created_at', 'desc')
     ->get();

    }
}
