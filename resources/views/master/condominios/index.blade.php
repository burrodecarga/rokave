@extends('adminlte::page')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 mx-auto">
            <div class="card card-table" style="width:100%">
                <div class="card-header card-header-table">
                    <h5 class="display-6 text-center mt-2 p-0 text-uppercase text-primary">{{__($title)}} </h5>
                </div>
                <div class="card-body card-body-table">
                    <div class="row">
                        <div class="col d-flex flex-row-reverse mr-4">
                            <a href="{{route('condominios.create')}}"
                                class="btn btn-outline-primary mb-2 float-left text-capitalize btn-new">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                {{__('new record')}}
                            </a>
                        </div>
                    </div>
                    @include('partials.success')
                    <table class="table table-striped table-bordered text-sm" style="width:100%" id="condominios">
                        <thead>
                            <tr>
                                <th width="35%">Condominio</th>
                                <th width="20%">email</th>
                                <th width="20%">Administrador</th>
                                <th width="25%" class="text-center">{{__('Acction')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($condominios as $condominio )
                            <tr>
                                <td scope="row" class="text-capitalize">{{$condominio->name}} </td>
                                <td scope="row" class="text-capitalize">{{$condominio->email}} </td>
                                <td scope="row" class="text-capitalize">
                                    @if($condominio->user_id)
                                    {{$condominio->administrador->name}}
                                    @endif
                                </td>
                                <td scope="row" class="text-capitalize">
                                    <a href="{{route('condominios.show',$condominio->id)}}"
                                        class="btn btn-outline-primary text-capitalize" data-toggle="tooltip"
                                        data-placement="top" title="{{__('show record')}} ">

                                        <i class="fa fa-list" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{route('condominios.edit',$condominio->id)}}"
                                        class="btn btn-outline-success text-capitalize" data-toggle="tooltip"
                                        data-placement="top" title="{{__('edit record')}} ">

                                        <i class="fa fa-wrench" aria-hidden="true"></i>
                                    </a>
                                    <form id="delete-form{{$condominio->id}}"
                                        action="{{route('condominios.destroy',$condominio->id)}}" method="POST"
                                        class="borrar btn">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn"> <i class="fa fa-trash-alt btn btn-danger btn-outline-warnig"
                                                aria-hidden="true"></i></button>
                                     </form>

                                     <form
                                        action="{{route('brands.create')}}"
                                        class="btn">
                                        @csrf
                                        <input type="hidden" name="condominio_id" value="{{$condominio->id}}">

                                        <button type="submit" class="btn btn-outline-primary">
                                            <i class="fa fa-at"
                                                aria-hidden="true"
                                                data-toggle="tooltip"
                                        data-placement="top" title="{{__('add Social Media')}} "
                                                ></i></button>
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

        table = $('#condominios').DataTable({
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
    // Swal.fire(
    //   'Deleted!',
    //   'Your file has been deleted.',
    //   'success'
    // )
  }
})
 })
    })

</script>

@stop
