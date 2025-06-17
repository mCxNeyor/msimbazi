<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Setting extends Component
{
    public $active;

    public function render()
    {
        return view('livewire.pages.setting');
    }

  public function mount()
    {
        $this->active="active";
    }
}
