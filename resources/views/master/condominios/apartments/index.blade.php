
@extends('adminlte::page')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card card-table" style="width:100%">
                <div class="card-header card-header-table">
                    <h5 class="display-6 text-center mt-2 p-0 text-uppercase text-primary">{{__($condominio->name.'  Apartments')}} </h5>
                </div>
                <div class="card-body card-body-table">
                    <div class="row">
                        <div class="col d-flex flex-row-reverse mr-4">
                            <a href="{{route('condominios-apartments.create',$condominio)}}"
                                class="btn btn-outline-primary mb-2 float-left text-capitalize btn-new">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                {{__('new record')}}
                            </a>
                        </div>
                    </div>
                        @include('partials.success')
                        <table class="table table-striped table-bordered" style="width:100%" id="apartments">
                            <thead>
                                <tr>
                                    <th width="25%">Name</th>
                                    <th width="30%">Address</th>
                                    <th width="15%">Phone</th>
                                    <th width="30%" class="text-center">{{__('Acction')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($apartments as $apartment )
                                <tr>
                                    <td scope="row" class="text-capitalize">{{$apartment->name}} </td>
                                    <td scope="row" class="text-capitalize">{{$apartment->address}} </td>
                                    <td scope="row" class="text-capitalize">{{$apartment->phone}} </td>
                                    <td scope="row" class="text-center">
                                        <a href="{{route('condominios-apartments.show',[$condominio->id,$apartment->id])}}"
                                            class="btn btn-outline-primary text-capitalize" data-toggle="tooltip"
                                            data-placement="top" title="{{__('show record')}} ">

                                            <i class="fa fa-list" aria-hidden="true"></i>
                                        </a>

                                        <a href="{{route('condominios-apartments.edit',[$condominio->id,$apartment->id])}}"
                                            class="btn btn-outline-primary text-capitalize" data-toggle="tooltip"
                                            data-placement="top" title="{{__('edit record')}} ">

                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>



                                        <form id="delete-form{{$apartment->id}}" action="{{route('condominios-apartments.destroy',[$condominio->id,$apartment->id])}}"
                                            method="POST"
                                            {{-- style="display: none;" --}}
                                            class="borrar btn">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn"> <i class="fa fa-trash-alt btn btn-danger btn-outline-warnig"
                                                aria-hidden="true"
                                                data-toggle="tooltip"
                                                data-placement="top" title="{{__('delete record')}} "></i></button>
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

<script src="{{asset('vendor/sweetalert2/sweetalert2.all.js')}}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function (){
        $(() => {
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            });
        });

        table = $('#apartments').DataTable({
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
                "targets": [3],
                "orderable": false
            }],

        });

        $('label').addClass('form-inline');
        $('select, input[type="search"]').addClass('form-control input-sm');
        $('.dataTables_length').addClass('bs-select');
    });



</script>

<script>
    document.addEventListener('DOMContentLoaded', function (){
        $('.borrar').submit(function(e){

e.preventDefault()
    Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
     this.submit()

  }
})
 })
 })

</script>

@stop


