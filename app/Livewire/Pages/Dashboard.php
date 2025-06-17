<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Dashboard extends Component
{
   public $active;

   
    public function render()
    {
        return view('livewire.pages.dashboard')->layout('layouts.app');
    }

    public function mount()
    {
        $this->active="active";
    }
}
