@extends('layouts.app')
@section('content')
<div class="row">
   <div class="col-md-12 btn-regresar mb-2">
        <a href=" {{route('condominios.index')}}" class="btn btn-sm btn-primary float-right">Regresar</a>
    </div>
</div>
<div class="card mb-3" style="max-width: 100%;">
    <div class="row no-gutters">
      <div class="col-md-4">
            <picture>
                    <img src="{{ asset($condominio->logo)}}" class="img-rounded img-thumbnail img-responsive"
                        alt="{{$condominio->condominio}}">
            </picture>
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">
               <strong>
                        {{$condominio->condominio}} RUT: {{$condominio->rut}}
               </strong>
          </h5>
          <p class="card-text">
                <p class="text-center">{{$condominio->direccion}} </p>
                   <div class="col-md-6">
                        <h5 class="panel-title text-center">{{$condominio->condominio}}</h5>


                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Teléfonos :</strong>{{$condominio->telefonos}} </li>
                            <li class="list-group-item"><strong>Correo Electrónico :</strong>{{$condominio->correo}} </li>
                            <li class="list-group-item">
                                <strong>Administrador :</strong>{{$condominio->administrador}}<br>
                            </li>
                            <li class="list-group-item">
                                <strong>twitter :</strong>{{$condominio->twiter}}
                            </li>
                            <li class="list-group-item">
                                <strong>facebook :</strong>{{$condominio->facebook}}
                            </li>

                            <li class="list-group-item">
                                <strong>instagram :</strong>{{$condominio->instagram}}
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                            @foreach ($bancos as $banco)
                            <li class="list-group-item"><strong>Banco :</strong>{{$banco->banco}} : {{$banco->cuenta}} </li>
                            @endforeach
                        </ul>
                        <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Interés de Mora :</strong>&nbsp;{{numerico($condominio->interes)}} % </li>
                            </ul>

                    </div>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                <div class="panel-footer">
                {{-- @can('mensualidad.crearMensualidad')<a href="{{route('mensualidades.crearMensualidad',$condominio->id)}} " class="btn btn-danger btn-sm">Activar Administración</a>@endcan --}}

                @can('user.show')<a href="#" class="btn btn-primary btn-sm">Propietarios</a>@endcan
                @can('user.show')<a href="#" class="btn btn-primary btn-sm">Inmuebles</a>@endcan
                @can('user.show')<a href="#" class="btn btn-success btn-sm pull-right">Enviar Mensaje</a>@endcan

            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
