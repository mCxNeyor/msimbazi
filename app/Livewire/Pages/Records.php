<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Records extends Component
{
    public $active;


    public function render()
    {
        return view('livewire.pages.records')->layout('layouts.app');
    }

    public function mount()
    {
        $this->active="active";
    }


}
