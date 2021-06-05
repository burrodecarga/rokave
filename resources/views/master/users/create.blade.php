@extends('adminlte::page')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 mx-auto bg-info rounded">
            <h4 class="text-uppercase"><strong>{{__($title)}}</strong></h4>
            <form class="shadow-sm rounded py-3 px-3 form-create" action="{{route('users.store')}} " method="POST">
             @include('master.users.partials.form')
            </form>
        </div>
    </div>
</div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>

    </script>

@stop

