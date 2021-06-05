@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')



    <table style='width:100%'>
        <tr>
            <td width='10%'><h4>HTTP Method</h4></td>
            <td width='10%'><h4>Route</h4></td>
            <td width='10%'><h4>Name</h4></td>
            <td width='70%'><h4>Corresponding Action</h4></td>
        </tr>
        @foreach ($routeCollection as $value)
            <tr>
                <td>{!! $value !!}</td>
                <td></td>
                <td></td>
                <td>{{ $value->uri }}</td>
            </tr>
        @endforeach
    </table>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>

    </script>

@stop
