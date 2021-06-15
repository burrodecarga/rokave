@extends('adminlte::page')

@section('content')<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                        <div class="row">
                                <div class="col-md-8">
                                 <h3 class="float-left">Edit Condominio</h3>
                                </div>
                                <div class="col-md-4">
                                <a href=" {{route('condominios.index')}}" class="btn btn-sm btn-primary float-right">Regresar</a>
                                </div>
                            </div>
                </div>
                <div class="card-body" x-data="{open:false}">
                    <h4 role="button" class="bg-primary p-2 rounded cursor-pointer" @click="open = !open"  >

                        @if ("this.show == true")
                             <i class="fas fa-plus-circle text-lg cursor-pointer"></i>
                             @else
                             <i class="fas fa-minus-circle text-lg cursor-pointer"></i>

                        @endif
                        Datos de condominio</h4>
                    @include('master.condominios.partials.errors')
                    <form action="{{route('condominios.update',$condominio->id)}}" id="MiForm" method="POST" enctype="multipart/form-data" >
                     @include('master.condominios.partials.formEdit')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('js')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<script src="{{asset('js/image.js')}}">

</script>
@stop
