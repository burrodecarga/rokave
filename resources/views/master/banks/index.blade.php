@extends('adminlte::page')

@section('content')

<div class="container">
    <div class="row w-75 mx-auto">
        <div class="col-12 mx-auto">
            <div class="card card-table" style="width:100%">
                <div class="card-header card-header-table">
                    <h5 class="display-8 text-center mt-2 p-0 text-uppercase text-primary">{{__( $condominio->name.'  List of Socials Media  ')}} </h5>
                </div>
                <div class="card-body card-body-table">
                    @include('partials.success')
                    <table class="table table-striped table-bordered text-sm" style="width:100%" id="condominios">
                        <thead>
                            <tr>
                                <th width="40%">Name</th>
                                <th width="40%">url</th>
                                <th width="20%" class="text-center">{{__('Acction')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($socials as $social )
                                <tr>
                                <td>{{$social->name}}</td>
                                <td>{{$social->url}}</td>
                                <td class="mx-auto"> <form id="delete-form{{$social->id}}"
                                    action="{{route('socials.destroy',$social->id)}}" method="POST"
                                    class="borrar btn">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn"> <i class="fa fa-trash-alt btn btn-danger btn-outline-warnig"
                                            aria-hidden="true"
                                            data-toggle="tooltip"
                                        data-placement="top" title="{{__('delete Social Media')}} "
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
                "targets": [2],
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

