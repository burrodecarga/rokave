@extends('adminlte::page')

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
                            <a href=" {{route('condominios.index')}}"
                                class="btn btn-sm btn-primary float-right">Regresar</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('master.condominios.partials.errors')
                    <form action="{{route('condominios.store')}}" id="MiForm" method="POST"
                        enctype="multipart/form-data">
                        @include('master.condominios.partials.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('js')
<script src="{{asset('js/image.js')}}">

</script>
@stop
