<div class="row" x-show="open">
    @csrf @method('PUT')

    <div class="form-group col-md-8">
        <label for="name">Condominio *</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Condominio"
            value="{{$condominio->name}}" aria-describedby="Ingrese Nombre del condominio">
        <small id="Ingrese Nombre del condominio" class="text-muted">Nombre o razón social del condominio</small>
    </div>

    <div class="form-group col-md-4">
        <label for="rut">Rut *</label>
        <input type="text" name="rut" id="rut" class="form-control" placeholder="Ingrese Rut"
            value="{{$condominio->rut}}" aria-describedby="Número de R.U.T.">
        <small id="Número de R.U.T." class="text-muted"> Número de R.U.T.</small>
    </div>

    <div class="form-group col-md-12    ">
        <label for="address">Direccion *</label>
        <input type="textarea" rows="2" cols="5" name="address" id="address" class="form-control"
            placeholder="Ingrese Dirección" value="{{$condominio->address}}" aria-describedby="helpId">
        <small id="helpId" class="text-muted">Dirección del Condominio</small>
    </div>


    <div class="form-group col-md-6">
        <label for="phone">Telefonos *</label>
        <input type="text" name="phone" id="phone" class="form-control" placeholder="Ingrese Números de Teléfonos"
            value="{{$condominio->phone}}" aria-describedby="helpId">
        <small id="helpId" class="text-muted"> Teléfonos del Condominio</small>
    </div>

    <div class="form-group col-md-6">
        <label for="mobil">Moviles *</label>
        <input type="text" name="mobil" id="mobil" class="form-control" placeholder="Ingrese Números de Teléfonos"
            value="{{$condominio->mobil}}" aria-describedby="helpId">
        <small id="helpId" class="text-muted"> Teléfonos del Condominio</small>
    </div>

    <div class="form-group col-md-6">
        <label for="email">email *</label>
        <input type="text" name="email" id="email" class="form-control" placeholder="Ingrese email electronico"
            value="{{$condominio->email}}" aria-describedby="Correo electrónico">
        <small id="Correo electrónico" class="text-muted">Dirección Electrónica</small>
    </div>

    <div class="form-group col-md-5">
        <label for="user_id">Administrador *</label>
        <select name="user_id" class="form-control" id="user_id">
            @foreach ($users as $u)
            <option value="{{$u->id}}" {{ ($u->id==$condominio->user_id ? "selected":"") }}> {{$u->name }} </option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-8">
        <div class="col-12">
            <label for="image" class="font-weight-bold font-italic">Logo</label>
            <input type="file" name="image" id="file" class="form-control b-0 p-1">
        </div>
        <div class="col-12">
            <input type="hidden" name="id" value="{{$condominio->id}}">

            <div class="form-group col-md-12">
                <input name="guardar" id="guardar" class="btn btn-success float-right" type="submit" value="guardar">
            </div>

        </div>

    </div>

    <div class="form-group col-md-4 mx-auto">
        <figure>
            @isset($condominio->logo)
            <img id="picture" src="{{Storage::url($condominio->logo)}}" alt="" class="img-thumbnail img-responsive">

            @else
            <img id="picture" src="{{asset('assets/logo/10.png')}}" alt="" class="img-thumbnail img-responsive">
            @endisset
        </figure>
    </div>
</div>

<div class="row col-12 mx-auto">
    <div class="redes  col-12  card" x-data="{open: false }">
        <div class="card-header cursor-pointer row" role="button" @click="open = ! open"
            @click.away="open=false">
            <div class="col-md-6">
                 <a class="bg-info p-2 rounded float-left">
                     <i class="fas fa-icons " title="Ocultar/Mostrar lista"></i>
                    <span  class="m-auto">
                        Redes Sociales
                    </span>
            </a>
            </div>
            </div>


        <div class="card-body " x-show="open">
            <ul class="list-group my-4">
                @foreach ($condominio->socials as $social)
                <li class="list-group-item list-group-item-success">{{$social->name.'  : '.$social->url}}</li>
                @endforeach
                </ul>
        </div>
    </div>

    <div class="redes  col-12  card" x-data="{open: false }">
        <div class="card-header cursor-pointer row" role="button" @click="open = ! open"
            @click.away="open=false">
            <div class="col-md-6">
                 <a class="bg-info p-2 rounded float-left">
                     <i class="fas fa-money-check-alt" title="Ocultar/Mostrar lista"></i>
                    <span  class="m-auto">
                        Bancos
                    </span>
            </a>
            </div>
            </div>


        <div class="card-body " x-show="open">
            <ul class="list-group my-4">
                @foreach ($condominio->banks as $bank)
                <li class="list-group-item list-group-item-success">{{$bank->bank.'  : '.$bank->ctta}}</li>
                @endforeach
                </ul>
        </div>
    </div>

    <div class="interes  col-12 card">
        <div class="card-header"><i class="fas fa-chart-bar"></i>Intereses de Mora</div>
        <div class="card-body">

        </div>
    </div>
</div>
