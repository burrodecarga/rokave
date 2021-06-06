@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                        <div class="row">
                                <div class="col-md-8">
                                 <h3 class="float-left">Nuevo Condominio</h3>
                                </div>
                                <div class="col-md-4">
                                <a href=" {{route('condominios.index')}}" class="btn btn-sm btn-primary float-right">Regresar</a>
                                </div>
                            </div>
                </div>
                <div class="card-body">
                    @include('condominios.partials.errors')
                    <form action="{{route('condominios.update',$condominio->id)}}" id="MiForm" method="POST" enctype="multipart/form-data">
                     @include('condominios.partials.formEdit')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
