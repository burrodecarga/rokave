<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    public function index(){
        return view('master.index');
    }

    public function rutas(){
        $routeList = Route::getRoutes();

foreach ($routeList as $value)
{

    echo $value->uri().'  -  '. $value->getName().'<br>';

    }
    }
}
