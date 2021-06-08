@extends('adminlte::page')
@section('content')
<form action="{{route('condominios-apartments.store',$condominio->id)}}" class="font-weight-bold font-italic row mx-auto w-75 bg-info rounded p-3"
    method="POST">
    @csrf
    @method('POST')


    <h5 class="col-12">{{$condominio->name}} <hr>Nuevo Apartamento<hr></h5>

    <div class="form-group col-md-3">
        <label for="user_id" class="font-weight-bold font-italic">Owner</label>

        <select name="user_id" class="form-control rounded @error("phone")is-invalid @else border-0 @enderror">
            <option value="">Select Owner</option>
            @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
        @error("user_id")
        <span class="invalid-feedback text-white" role="alert"><strong>{{$message}}</strong> </span>
        @enderror
    </div>

    <div class="form-group col-3">
        <label for="name" class="font-weight-bold font-italic">{{__('name')}} </label>
        <input id="name" type="text" name="name" value="{{old("name", $apartment->name)}}"
            class="form-control bg-light shadow-sm  @error("name")is-invalid @else border-0 @enderror">
        @error("name")
        <span class="invalid-feedback text-white" role="alert"><strong>{{$message}}xx</strong> </span>
        @enderror
    </div>

    <div class="form-group col-3">
        <label for="phone" class="font-weight-bold font-italic">{{__('phone')}} </label>
        <input id="phone" type="text" name="phone" value="{{old("phone", $apartment->phone)}}"
            class="form-control bg-light shadow-sm  @error("phone")is-invalid @else border-0 @enderror">
        @error("phone")
        <span class="invalid-feedback text-white" role="alert"><strong>{{$message}}xx</strong> </span>
        @enderror
    </div>

    <div class="form-group col-3">
        <label for="mobil" class="font-weight-bold font-italic">{{__('mobil')}} </label>
        <input id="mobil" type="text" name="mobil" value="{{old("mobil", $apartment->mobil)}}"
            class="form-control bg-light shadow-sm  @error("mobil")is-invalid @else border-0 @enderror">
        @error("phone")
        <span class="invalid-feedback text-white" role="alert"><strong>{{$message}}xx</strong> </span>
        @enderror
    </div>





    <div class="form-group col-8">
        <label for="address" class="font-weight-bold font-italic">{{__('address')}} </label>
        <input id="address" type="text" name="address" value="{{old("address", $apartment->address)}}"
            class="form-control bg-light shadow-sm  @error("address")is-invalid @else border-0 @enderror">
        @error("address")
        <span class="invalid-feedback text-white" role="alert"><strong>{{$message}}xx</strong> </span>
        @enderror
    </div>


    <div class="form-group col-2">
        <label for="area" class="font-weight-bold font-italic">{{__('area m2')}}</label>
        <input id="area" type="numeric" name="area" value="{{old("area", $apartment->area)}}"
            class="form-control bg-light shadow-sm  @error("area")is-invalid @else border-0 @enderror">
        @error("area")
        <span class="invalid-feedback text-white" role="alert"><strong>{{$message}}</strong> </span>
        @enderror
    </div>

    <div class="form-group col-2">
        <label for="alicuota" class="font-weight-bold font-italic">{{__('alicuota %')}} </label>
        <input id="alicuota" type="numeric" name="alicuota" value="{{old("alicuota", $apartment->alicuota)}}"
            class="form-control bg-light shadow-sm  @error("alicuota")is-invalid @else border-0 @enderror">
        @error("alicuota")
        <span class="invalid-feedback text-white" role="alert"><strong>{{$message}}</strong> </span>
        @enderror
    </div>




    <div class="form-group col-md-12">
        <a href="{{route('condominios-apartments.index',$condominio->id)}}" class="btn btn-warning">Regresar</a>

        <input name="guardar" id="guardar" class="btn btn-danger float-right" type="submit" value="guardar">
    </div>

</form>

@stop
