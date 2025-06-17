<?php

namespace App\Livewire\Pages;

use App\Models\Device;
use Livewire\Component;

class Gauges extends Component
{
    public $devices;

    public function render()
    {
        return view('livewire.pages.gauges')->layout('layouts.app');
    }

    public function mount()
    {
        $this->devices=Device::with('latestData')->get();
    }
}
