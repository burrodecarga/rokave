<div class="row">
        @csrf @method('PUT')

        <div class="form-group col-md-8">
            <label for="condominio">Condominio *</label>
            <input type="text" name="condominio" id="condominio" class="form-control" placeholder="Condominio" value="{{$condominio->condominio}}"
                aria-describedby="Ingrese Nombre del condominio">
            <small id="Ingrese Nombre del condominio" class="text-muted">Nombre o razón social del condominio</small>
        </div>

        <div class="form-group col-md-4">
            <label for="rut">Rut *</label>
            <input type="text" name="rut" id="rut" class="form-control" placeholder="Ingrese Rut" value="{{$condominio->rut}}" aria-describedby="Número de R.U.T.">
            <small id="Número de R.U.T." class="text-muted"> Número de R.U.T.</small>
        </div>

        <div class="form-group col-md-12    ">
            <label for="direccion">Direccion *</label>
            <input type="textarea" rows="2" cols="5" name="direccion" id="direccion" class="form-control" placeholder="Ingrese Dirección"
                value="{{$condominio->direccion}}" aria-describedby="helpId">
            <small id="helpId" class="text-muted">Dirección del Condominio</small>
        </div>


        <div class="form-group col-md-6">
            <label for="telefonos">Telefonos *</label>
            <input type="text" name="telefonos" id="telefonos" class="form-control" placeholder="Ingrese Números de Teléfonos" value="{{$condominio->telefonos}}"
                aria-describedby="helpId">
            <small id="helpId" class="text-muted"> Teléfonos del Condominio</small>
        </div>

        <div class="form-group col-md-6">
            <label for="correo">Correo *</label>
            <input type="text" name="correo" id="correo" class="form-control" placeholder="Ingrese Correo electronico" value="{{$condominio->correo}}"
                aria-describedby="Correo electrónico">
            <small id="Correo electrónico" class="text-muted">Dirección Electrónica</small>
        </div>


        <div class="form-group col-md-4">
            <label for="twitter">twitter</label>
            <input type="text" name="twitter" id="twitter" class="form-control" placeholder="Ingrese twtter" value="{{$condominio->twitter}}"
                aria-describedby="twitter">
            <small id="twitter" class="text-muted">Ingrese twitter</small>
        </div>

        <div class="form-group col-md-4">
            <label for="instagram">instagram</label>
            <input type="text" name="instagram" id="instagram" class="form-control" placeholder="Ingrese Instagram" value="{{$condominio->instagram}}"
                aria-describedby="instagram">
            <small id="instagram" class="text-muted">Ingrese instagram</small>
        </div>

        <div class="form-group col-md-4">
            <label for="facebook">facebook</label>
            <input type="text" name="facebook" id="facebook" class="form-control" placeholder="Ingrese Facebook" value="{{$condominio->facebook}}"
                aria-describedby="facebook">
            <small id="facebook" class="text-muted">Ingrese facebook</small>
        </div>

        <div class="form-group col-md-2">
            <label for="interes">Interes *</label>
            <input type="text" name="interes" id="interes" class="form-control" placeholder="Interes" value="{{$condominio->interes}}"
                aria-describedby="interes">
            <small id="interes" class="text-muted">interes por Morosidad</small>
        </div>


        <div class="form-group col-md-5">
            <label for="user_id">Administrador *</label>
            <select name="user_id" class="form-control" id="user_id">
              @foreach ($users as $u)
                    <option  value="{{$u['user_id']}}"{{ ($u['user_id']==$condominio->user_id) ? "selected":"" }} > {{$u['name'] }} </option>
              @endforeach
          </select>
        </div>

        <div class="form-group col-md-3">
            <label for="logo">Logo</label>
            <input type="file" class="form-control-file" name="logo" id="logo" placeholder="Logo" aria-describedby="Logo de condominio ">
            <small id="Logo de condominio " class="form-text text-muted">Logo de condominio</small>
        </div>

    <div class="form-group col-md-2">
        <picture>
            <img src="{{ asset($condominio->logo)}}" class="img-rounded img-thumbnail img-responsive"
                alt="{{$condominio->condominio}}">
        </picture>

    </div>

        <input type="hidden" name="id" value="{{$condominio->id}}">

        <div class="form-group col-md-12">
            <input name="guardar" id="guardar" class="btn btn-success float-right" type="submit" value="guardar">
        </div>
