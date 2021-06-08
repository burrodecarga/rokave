@extends('adminlte::page')

@section('content')
 <div class="w-75 mx-auto">
    <form action="{{route('brands.store')}}" method="POST">
        @csrf
        @method('POST')
        <input type="hidden" name="condominio_id" value="{{$condominio_id}}">
        <div class="row bg-white p-3 rounded">
            <h4 class="col-12 text-lg font-bold">Agregar Nueva Red Social</h4>

            <div class="form-group col-md-3">
                <label for="name" class="font-weight-bold font-italic">Name</label>
                @error("name")
                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
                @enderror
                <select name="name" class="form-control rounded">
                    @foreach ($brands as $brand)
                    <option value="{{$brand->name}}">{{$brand->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-6">
                <label for="url" class="font-weight-bold font-italic">{{__('url')}} </label>
                <input id="url" type="text" name="url" value="{{old("url", $brand->url)}}"
                    class="form-control bg-light shadow-sm  @error("url")is-invalid @else border-0 @enderror">
                @error("url")
                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
                @enderror
            </div>


            <div class="form-group col-md-3">
                <label for="url" class="font-weight-bold font-italic">crear</label>
                <input type="submit" class="form-control btn btn-success btn-small" value="crear">
            </div>
        </div>
    </form>
 </div>
@stop
