
<div class="row">

     @csrf

     <div class="form-group col-md-8">
           <label for="name" class="font-weight-bold font-italic">Nombre del condominio</label>
           <input type="text" name="name"  class="form-control" value="{{old('name')}} " >
    </div>


    <div class="form-group col-md-4">
            <label for="rut" class="font-weight-bold font-italic">R.U.T.</label>
            <input type="text" name="rut"  class="form-control" value="{{old('rut')}}">
     </div>


     <div class="form-group col-md-12">
            <label for="address" class="font-weight-bold font-italic">Dirección</label>
            <input type="text" name="address"  class="form-control" value="{{old('address')}}" >
     </div>


     <div class="form-group col-md-6">
            <label for="telefonos" class="font-weight-bold font-italic">telefonos</label>
            <input type="text" name="telefonos"  class="form-control"  value="{{old('telefonos')}}" >
     </div>

     <div class="form-group col-md-6">
        <label for="mobil" class="font-weight-bold font-italic">Tlf. Movil</label>
        <input type="text" name="mobil"  class="form-control"  value="{{old('mobil')}}" >
 </div>

     <div class="form-group col-md-6">
            <label for="email" class="font-weight-bold font-italic">correo</label>
            <input type="text" name="email"  class="form-control" value="{{old('email')}}" >
     </div>


     <div class="form-group col-md-6">
            <label for="user_id" class="font-weight-bold font-italic">administrador</label>
            <select class="form-control" name="user_id" id="administrador">
             @foreach ($users as $u)
                 <option value="{{$u->id}}">{{$u->name}} </option>
             @endforeach
              </select>
     </div>


    <div class="form-group col-md-6">
        <figure>
            <img id="picture" src="#" alt="" class="img-thumbnail" width="100%" height="100%">
        </figure>
    </div>

    <div class="form-group col-md-6">
        <label for="image" class="font-weight-bold font-italic">Logo</label>
        <input type="file" name="image" id="file" class="form-control b-0 p-1">
    </div>

    <div class="form-group col-md-12">
        <input name="guardar" id="guardar" class="btn btn-success float-right" type="submit" value="guardar">
    </div>


</div>
