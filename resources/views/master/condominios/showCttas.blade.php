@extends('layouts.app')@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('css/dataTables.bootstrap4.min.css')}}" />
<div class="container">
    <div class="tabla">
        <div class="session-info">
            @if(session('info'))
            {{ session('info') }}
            @endif
        </div>
        <div class="tabla-titulo">
            <div class="titulo">
                <h3>Listado de Cuentas Bancarias <small><strong>{{$condominio->condominio}} </strong></small> </h3>
            </div>
            <div class="boton-nuevo">
                @can('apartamentos.create')
                <a href="{{ route('home.createCtta',$condominio->id) }}" class="btn btn-sm btn-success float-right">Nueva Cuenta</a>
                @endcan
            </div>
        </div>
    </div>
    <div class="tabla-cuerpo mt-2">
        <table id="table_id" class="table table-hover table-striped text-center">
            <thead class="">
                <th width="20px">Id</th>
                <th>Banco</th>
                <th>Cuenta</th>
                <th>debe</th>
                <th>haber</th>
                <th>saldo</th>
                <th></th>
            </thead>

            <tbody>
                @foreach ($bancos as $c )
                <tr>
                    <td>{{$c->id}} </td>
                    <td>{{$c->banco}} </td>
                    <td>{{$c->cuenta}} </td>
                    <td>{{numerico($c->debe)}} </td>
                    <td>{{numerico($c->haber)}} </td>
                    <td>{{numerico($c->saldo)}} </td>
                    <td whidth="10px">
                        @can('condominios.show')
                        <a href="{{route('home.editCtta',$c->id)}} " class="btn btn-primary btn-sm">Editar</a>
                        @endcan
                    </td>
                    <td whidth="10px">
                        @can('condominios.destroy')
                        <form id="destroy-form" action="{{ route('cuentas.destroy', $c->id) }}" method="POST">
                            {{ csrf_field() }} {{ method_field('DELETE') }}
                            <input type="submit" value="Eliminar" class="btn btn-danger btn-sm">
                        </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>



</div>@endsection

<script type="text/javascript" src="{{asset('js/jquery-3.3.1.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>



<script>
    $(document).ready( function () {
        $('#table_id').DataTable({
            "pagingType":"full_numbers",
           "language":{
             "info": "Mostrando pag  _PAGE_ de _PAGES_  páginas,  Total de Registros: _TOTAL_ ",
               "search":"Buscar  ",
               "paginate":{
                   "next":"Siguiente",
                   "previous":"Anterior",
                   "last":"Último",
                   "first":"Primero",
               },
               "lengthMenu":"Mostrar  <select class='custom-select custom-select-sm'>"+
                             "<option value='5'>5</option>"+
                             "<option value='10'>10</option>"+
                             "<option value='15'>15</option>"+
                             "<option value='20'>20</option>"+
                             "<option value='25'>25</option>"+
                             "<option value='50'>50</option>"+
                             "<option value='100'>100</option>"+
                             "<option value='-1'>Todos</option>"+
                             "</select> Registros",
               "loadingRecord":"Cargando....",
               "processing":"Procesando...",
               "emptyTable":"No hay Registros",
               "zeroRecords":"No hay coincidencias",
               "infoEmpty":"",
               "infoFiltered":""
           },
           "columnDefs": [{ "targets": [6], "orderable": false }]


        });
    } );
</script>
