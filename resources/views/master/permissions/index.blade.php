@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card card-table" style="width:100%">
                <div class="card-header card-header-table">
                    <h5 class="display-6 text-center mt-2 p-0 text-uppercase text-white">{{__($title)}} </h5>
                </div>
                <div class="card-body card-body-table">
                    <div class="row d-flex ">
                        <div class="col d-flex flex-row-reverse mr-4">
                            <a href="{{route('permissions.create')}}"
                                class="btn btn-outline-primary mb-2 text-capitalize btn-new">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                {{__('new record')}}
                            </a>
                        </div>
                    </div>
                        @include('partials.success')
                        <table class="table table-striped table-bordered" style="width:100%" id="permissions">
                            <thead>
                                <tr>
                                    <th width="25%">Ruta</th>
                                    <th width="55%">Permiso</th>
                                    <th width="20%" class="text-center">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission )
                                <tr>
                                    <td scope="row" class="text-capitalize">{{$permission->name}} </td>
                                    <td scope="row" class="text-capitalize">{{$permission->permission}} </td>
                                    <td>
                                        <a href="{{route('permissions.show',$permission->id)}}"
                                            class="btn btn-outline-primary text-capitalize" data-toggle="tooltip"
                                            data-placement="top" title="{{__('show record')}} ">

                                            <i class="fa fa-list" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{route('permissions.edit',$permission->id)}}"
                                            class="btn btn-outline-success text-capitalize" data-toggle="tooltip"
                                            data-placement="top" title="{{__('edit record')}} ">

                                            <i class="fa fa-wrench" aria-hidden="true"></i>
                                        </a>

                                        <a class="btn btn-outline-danger text-capitalize" href="#" onclick="event.preventDefault();
                                                     document.getElementById('delete-form{{$permission->id}}').submit();"
                                            data-toggle="tooltip" data-placement="top" title="{{__('delete record'.$permission->id)}} ">

                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                        <form id="delete-form{{$permission->id}}" action="{{route('permissions.destroy',$permission->id)}}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function (){
        $(() => {
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            });
        });

        table = $('#permissions').DataTable({
            "sPaginationType": "bootstrap",
            "pagingType": "full_numbers",
            "language": {
                "info": "Pág.  _PAGE_ de _PAGES_  pág(s)  Total: _TOTAL_ ",
                "search": "Buscar  ",
                "paginate": {
                    "next": "Sig.",
                    "previous": "Ant.",
                    "last": "Último",
                    "first": "Primero",
                },
                "lengthMenu": "Mostrar  <select class='custom-select custom-select-sm'>" +
                    "<option value='5'>5</option>" +
                    "<option value='10'>10</option>" +
                    "<option value='15'>15</option>" +
                    "<option value='20'>20</option>" +
                    "<option value='25'>25</option>" +
                    "<option value='50'>50</option>" +
                    "<option value='100'>100</option>" +
                    "<option value='-1'>Todos</option>" +
                    "</select> Registros",
                "loadingRecord": "Cargando....",
                "processing": "Procesando...",
                "emptyTable": "No hay Registros",
                "zeroRecords": "No hay coincidencias",
                "infoEmpty": "",
                "infoFiltered": ""
            },
            "columnDefs": [{
                "targets": [2],
                "orderable": false
            }],

        });

        $('label').addClass('form-inline');
        $('select, input[type="search"]').addClass('form-control input-sm');
        $('.dataTables_length').addClass('bs-select');
    });

</script>

@stop
