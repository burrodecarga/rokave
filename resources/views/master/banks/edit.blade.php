@extends('adminlte::page')

@section('content')
 <div class="w-75 mx-auto">
    <form action="{{route('banks.update',$bank->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row bg-white p-3 rounded">
            <h4 class="col-12 text-lg font-bold">Editar Cuenta Bancaria</h4>


            <div class="form-group col-6">
                <label for="bank" class="font-weight-bold font-italic">{{__('bank')}} </label>
                <input id="bank" type="text" name="bank" value="{{old("bank", $bank->bank)}}"
                    class="form-control bg-light shadow-sm  @error("bank")is-invalid @else border-0 @enderror">
                @error("bank")
                <span class="invalid-feedback" role="alert"><strong>{{$message}}xx</strong> </span>
                @enderror
            </div>

            <div class="form-group col-6">
                <label for="ctta" class="font-weight-bold font-italic">{{__('ctta')}} </label>
                <input id="ctta" type="text" name="ctta" value="{{old("ctta", $bank->ctta)}}"
                    class="form-control bg-light shadow-sm  @error("ctta")is-invalid @else border-0 @enderror">
                @error("ctta")
                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
                @enderror
            </div>

            <div class="form-group col-6">
                <label for="owner" class="font-weight-bold font-italic">{{__('owner')}} </label>
                <input id="owner" type="text" name="owner" value="{{old("owner", $bank->owner)}}"
                    class="form-control bg-light shadow-sm  @error("owner")is-invalid @else border-0 @enderror">
                @error("owner")
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
