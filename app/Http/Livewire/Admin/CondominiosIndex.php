<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class CondominiosIndex extends Component
{


    public function render()
    {
        $condominios = auth()->user()->condominios;


        return view('livewire.admin.condominios-index', ['condominios'=>$condominios]);
    }
}
