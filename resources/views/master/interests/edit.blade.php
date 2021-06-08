@extends('adminlte::page')

@section('content')
 <div class="w-75 mx-auto">
    <form action="{{route('interests.update',$interest->id)}}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="condominio_id" value="{{$condominio->id}}">
        <div class="row bg-white p-3 rounded">
            <h4 class="col-12 text-lg font-bold">Editar interés de mora</h4>


            <div class="form-group col-6">
                <label for="value" class="font-weight-bold font-italic">{{__('value')}} </label>
                <input id="value" type="numeric" name="value" value="{{old("value", $interest->value)}}"
                    class="form-control bg-light shadow-sm  @error("value")is-invalid @else border-0 @enderror">
                @error("value")
                <span class="invalid-feedback" role="alert"><strong>{{$message}}xx</strong> </span>
                @enderror
            </div>

            <div class="form-group col-6">
                <label for="date" class="font-weight-bold font-italic">{{__('date')}} </label>
                <input id="date" type="date" name="date" value="{{old("date", $interest->date)}}"
                    class="form-control bg-light shadow-sm  @error("date")is-invalid @else border-0 @enderror">
                @error("date")
                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
                @enderror
            </div>

            <div class="form-group col-md-3">
                <label class="font-weight-bold font-italic">actualizar</label>
                <input type="submit" class="form-control btn btn-success btn-small" value="actualizar" role="button">
            </div>
        </div>
    </form>
 </div>
@stop
