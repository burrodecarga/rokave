<?php

namespace App\View\Components\condominio;

use App\Models\Condominio as ModelsCondominio;
use Illuminate\View\Component;

class condominio extends Component
{

    public $condominio,$id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Condominio $condominio)
    {

        $this->condominio = $condominio;
        // $this->id = $condominio->id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.condominio.condominio');
    }
}
