<div class="row">
    <div class="col-xs-12">
        <div class="card card-no-bottom-line admin-form">
            <div class="side-body"></div>
            <div class="card-body">
                
                {!! Form::model($usuario, [ 'route' => ['usuario.update', $usuario->id], 'id' => 'form-edit', 'method' => 'PATCH', 'class' => 'form-horizontal form-modal-left']) !!}

                    <div class="form-group">
                        <label for="txt-name" class="col-sm-4 control-label">Nombre</label>
                        <div class="col-sm-8">
                            <label class="field">
                                <input id='txt-name' name="nombre" value="{{ $usuario->name }}" class="gui-input" placeholder="Nombre" value="{{old('name', isset($usuario->name) ? $usuario->name : null) }}">
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txt_mail" class="col-sm-4 control-label">Correo </label>
                        <div class="col-sm-8">
                            <label class="field">
                                <input type='text' id='txt_email' name="email" class="form-control gui-input" placeholder="Correo ..." value="{{old('email', isset($usuario->email) ? $usuario->email : null) }}"/>
                            </label>                        
                        </div>                                    
                    </div> 
                    <div class="form-group">
                        <label for="txt-name" class="col-sm-4 control-label">Teléfono</label>
                        <div class="col-sm-8">
                            <label class="field">
                                <input id='txt-name' name="phone" value="{{ $usuario->phone }}" class="gui-input" placeholder="Teléfono" value="{{old('phone', isset($usuario->phone) ? $usuario->phone : null) }}"/>
                            </label>
                        </div>  
                    </div>
                    <div class="form-group">
                        <label for="txt-compañia" class="col-sm-4 control-label">Compañia</label>
                        <div class="col-sm-8">
                            <label class="field">
                                <input id='txt-address' name="compañia" value="{{ $usuario->compañia }}" class="gui-input" placeholder="Compañia"  value="{{old('compañia', isset($usuario->compañia) ? $usuario->compañia : null) }}"/>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txt-lat" class="col-sm-4 control-label">Latitud</label>
                        <div class="col-sm-8">
                            <label class="field">
                                <input id='txt-lat' name="lat" value="{{ $usuario->lat }}" class="gui-input" placeholder="Compañia"  value="{{old('lat', isset($usuario->lat) ? $usuario->lat : null) }}"/>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txt-lng" class="col-sm-4 control-label">Longitud</label>
                        <div class="col-sm-8">
                            <label class="field">
                                <input id='txt-lng' name="lng" value="{{ $usuario->lng }}" class="gui-input" placeholder="Compañia"  value="{{old('lng', isset($usuario->lng) ? $usuario->lng : null) }}"/>
                            </label>
                        </div>
                    </div>

                

                {!! Form::close() !!}  

            </div>

        </div>

    </div>

</div>