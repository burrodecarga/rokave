@csrf

<div class="row">
<div class="form-group col-12 col-md-6">
    <label for="name" class="form-label font-weight-bold text-capitalize">{{__("route of permission")}} </label>
    <input id="name" type="text" name="name" value="{{old('name', $permission->name)}}"
        class="form-control shadow-sm  @error('name')is-invalid @else border-0 @enderror">
    @error('name')
    <span class="invalid-feedback" permission="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>

<div class="form-group col-12 col-md-6">
    <label for="permission" class="form-label font-weight-bold text-capitalize">{{__("detail of permission")}} </label>
    <input id="permission" type="text" name="permission" value="{{old('permission', $permission->permission)}}"
        class="form-control shadow-sm  @error('permission')is-invalid @else border-0 @enderror">
    @error('permission')
    <span class="invalid-feedback" permission="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>


<div class="form-group col-12 col-md-6">
<button class="btn btn-success text-capitalize">{{__($btn)}}</button>
<a href="{{route('permissions.index')}}" class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}} </a>
</div>
</div>
