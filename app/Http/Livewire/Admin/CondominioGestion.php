<?php

namespace App\Http\Livewire\Admin;

use App\Models\Condominio;
use Livewire\Component;

class CondominioGestion extends Component
{
    // public $condominio;
    // public function __construct(Condominio $condominio){
    //     dd($condominio);
    //   $this->condominio = $condominio;
    // }
    public function render()
    {
        dd(xx);
        return view('livewire.admin.condominio-gestion');
    }
}
