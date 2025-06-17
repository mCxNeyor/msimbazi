<?php

namespace App\Livewire\Pages;

use App\Models\Device;
use Livewire\Component;

class Panel extends Component
{
   
    public $active,$devices;

   
    public function render()
    {
        return view('livewire.pages.panel')->layout('layouts.app');
    }

    public function mount()
    {
        
        $this->active=Device::all();
        $this->devices = Device::with('latestData')->get();
    }
}
