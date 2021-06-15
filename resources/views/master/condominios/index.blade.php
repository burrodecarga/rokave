@extends('adminlte::page')

@section('content')

<div class="container">
    @include('partials.success')

    <div class="row">
        <div class="col d-flex flex-row-reverse mr-4">
            <a href="{{route('condominios.create')}}"
                class="btn btn-outline-primary mb-2 float-left text-capitalize btn-new">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                {{__('new record')}}
            </a>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th class="text-center text-xl">Información del Condominio</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($condominios as $condominio)
            <tr>
                <td>
                    <div class="col-lg-6 offset-md-3">
                        <div class="card">
                            @if($condominio->logo)
                            <img src="{{asset('storage/'.$condominio->logo)}}" class="card-img-top p-4"
                                alt="{{$condominio->name}}">
                                @else
                                <img src="{{asset('assets/logo/9.png')}}" class="card-img-top p-4"
                                alt="rokave">
                                @endif
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <h5>{{$condominio->name}}
                                    <span class="text-sm d-block font-italic">{{$condominio->rut}}</span>
                                </h5>

                                <hr class="m-0">
                                <h6>{{$condominio->address}}</h6>
                                <hr class="m-0">
                                <h6 class="text-sm my-1">{{$condominio->phone}}<span> |
                                        {{$condominio->mobil}}</span></h6>
                                <hr class="m-0">
                                <h6 class="text-sm my-1">{{$condominio->email}}</h6>
                                <hr class="m-0">
                                @if ($condominio->aministrador)
                                <h6 class="text-sm my-1">Admin : <span> |
                                        {{$condominio->administrador}}</span></h6>
                                <hr class="m-0">
                                @else
                                <h6 class="text-sm my-1">Admin : <span> |
                                        No tiene administrador</span></h6>
                                <hr class="m-0">

                                @endif
                                <hr class="m-0">
                                @foreach ($condominio->socials as $social )
                                <a href="{{$social->url}}" class="inline-block"><small class="inline-block">
                                        {{$social->name. ' : '.$social->url}}</small></a><br>
                                @endforeach
                                <hr class="m-0">
                                <hr class="m-0">
                                @foreach ($condominio->banks as $bank )
                                <a href="#" class="inline-block"><small class="inline-block">
                                        {{$bank->ctta. ' : '.$social->name}}</small></a><br>
                                @endforeach
                                <hr class="m-0">

                                <hr class="m-0">
                                @foreach ($condominio->interests as $interest )
                                <a href="#" class="inline-block"><small class="inline-block">
                                        interes : {{$interest->value. ' % : Fecha : '.$interest->date}}</small></a><br>
                                @endforeach
                                <hr class="m-0">

                                <h5 class="font-italic">operaciones</h5>
                                {{-- condominio --}}
                                <div class="mx-auto text-center bg-secondary rounded my-1">
                                    <div class="d-flex justify-content-around align-items-center">
                                        <h6 class="mx-auto">Condominio:</h6>
                                        <span class="bg-white p-2 mx-auto my-1 rounded">


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
                                                <button type="submit" class="btn" data-toggle="tooltip"
                                                    data-placement="top" title="{{__('delete record')}} "
                                                    title="delete Record">
                                                    <i class="fa fa-trash-alt border-0 btn btn-danger "
                                                        aria-hidden="true"></i></button>
                                            </form>
                                        </span>
                                    </div>
                                </div>

                                {{-- Redes sociales --}}
                                <div class="mx-auto text-center bg-secondary rounded my-1">
                                    <div class="d-flex justify-content-around align-items-center">
                                        <h6 class="mx-auto">Social Media Inf:</h6>
                                        <span class="bg-white p-2 mx-auto my-1 rounded">
                                            <form action="{{route('socials.create')}}" class="btn">

                                                <input type="hidden" name="condominio_id" value="{{$condominio->id}}">

                                                <button type="submit" class="btn btn-outline-primary">
                                                    <i class="fa fa-at" aria-hidden="true" data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="{{__('add Social Media')}} "></i></button>
                                            </form>

                                            <form action="{{route('socials.index')}}" class="btn">

                                                <input type="hidden" name="condominio_id" value="{{$condominio->id}}">

                                                <button type="submit" class="btn btn-outline-danger">
                                                    <i class="fa fa-at" aria-hidden="true" data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="{{__('delete Social Media')}} "></i></button>
                                            </form>
                                        </span>
                                    </div>
                                </div>

                                {{-- Bancos --}}

                                <div class="mx-auto text-center bg-secondary rounded my-1">

                                    <div class="d-flex justify-content-around align-items-center">
                                        <h6 class="mx-auto">Cttas Bancarias:</h6>
                                        <span class="bg-white p-2 mx-auto my-1 rounded">
                                            <form action="{{route('banks.create')}}" class="btn">

                                                <input type="hidden" name="condominio_id" value="{{$condominio->id}}">

                                                <button type="submit" class="btn btn-outline-primary">
                                                    <i class="fa fa-comments-dollar" aria-hidden="true"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="{{__('add Bank')}} "></i></button>
                                            </form>

                                            <form action="{{route('banks.index')}}" class="btn">

                                                <input type="hidden" name="condominio_id" value="{{$condominio->id}}">

                                                <button type="submit" class="btn btn-outline-danger">
                                                    <i class="fa fa-comments-dollar" aria-hidden="true"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="{{__('edit Banks')}} "></i></button>
                                            </form>

                                        </span>
                                    </div>
                                </div>

                                {{-- Intereses--}}

                                <div class="mx-auto text-center bg-secondary rounded my-1">

                                    <div class="d-flex justify-content-around align-items-center">
                                        <h6 class="mx-auto">Intereses de Mora:</h6>
                                        <span class="bg-white p-2 mx-auto my-1 rounded">
                                            <form action="{{route('interests.create')}}" class="btn">

                                                <input type="hidden" name="condominio_id" value="{{$condominio->id}}">

                                                <button type="submit" class="btn btn-outline-primary">
                                                    <i class="fa fa-chart-bar" aria-hidden="true" data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="{{__('add interest')}} "></i></button>
                                            </form>

                                            <form action="{{route('interests.index')}}" class="btn">

                                                <input type="hidden" name="condominio_id" value="{{$condominio->id}}">

                                                <button type="submit" class="btn btn-outline-danger">
                                                    <i class="fa fa-chart-bar" aria-hidden="true" data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="{{__('edit interests')}} "></i></button>
                                            </form>
                                        </span>
                                    </div>
                                </div>

                                {{--apartamentos---}}

                                <div class="mx-auto text-center bg-secondary rounded my-1">

                                    <div class="d-flex justify-content-around align-items-center">
                                        <h6 class="mx-auto">Apartamentos:</h6>
                                        <span class="bg-white p-2 mx-auto my-1 rounded">
                                            <a href="{{route('condominios-apartments.index',$condominio)}}"
                                                class="btn btn-outline-success text-capitalize" data-toggle="tooltip"
                                                data-placement="top" title="{{__('List of Apartments')}} ">

                                                <i class="fa fa-boxes" aria-hidden="true"></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">Footer
                            </div>
                        </div>
                    </div>

                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

</div>
<div class="col-lg-6 offset-md-3">
            {{$condominios->links('vendor.pagination.bootstrap-4')}}
</div>


@stop

@section('css')
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script src="{{asset('vendor/sweetalert2/sweetalert2.all.js')}}" defer></script>

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
                    "<option value='-1'>1</option>" +
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
                "targets": [0],
                "orderable": true
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
