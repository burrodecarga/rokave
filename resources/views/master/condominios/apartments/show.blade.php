@extends('adminlte::page')
@section('content')
<div class="card">
    <div class="card-header">
      Dueño: {{$apartment->user?->name}}
    </div>
    <div class="card-body">
      <h5 class="card-title">{{$condominio->name}} -- {{$apartment->name}}</h5>
      <p class="card-text">{{$apartment->address}}</p>
      <p class="card-text">{{$apartment->phone}}</p>
      <p class="card-text">{{$apartment->mobil}}</p>
      <p class="card-text">Area :{{$apartment->area}} m2</p>
      <p class="card-text">Alicuota :{{$apartment->alicuota}} m2</p>
      <hr>


      <p class="card-text"> Gastos</p>

      <a href="{{route('condominios-apartments.index',$condominio->id)}}" class="btn btn-warning">Regresar</a>
    </div>
  </div>

@stop
