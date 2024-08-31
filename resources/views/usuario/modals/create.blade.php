<div class="row">
    <div class="col-xs-12">
        <div class="card card-no-bottom-line admin-form">
            <div class="side-body"></div>
            <div class="card-body">
                    {!! Form::open([ 'route' => ['usuario.store'], 'class' => 'form-horizontal form-modal-left', 'id' => 'form-create' ]) !!}                  
                    <div class="form-group">
                        <label for="txt_name" class="col-sm-4 control-label">Nombre</label>
                        <div class="col-sm-8">
                            <label class="field">
                                <input type="text" class="form-control gui-input" id="name" name="name" placeholder="Nombre...">
                            </label>                            
                        </div>                                    
                    </div>
                    <div class="form-group">
                        <label for="txt_phone" class="col-sm-4 control-label">Teléfono</label>
                        <div class="col-sm-8">
                            <label class="field">
                                <input type="text" class="form-control gui-input only_number" id="phone" name="phone" placeholder="Teléfono...">
                            </label>
                        </div>                                    
                    </div>
                    <div class="form-group">
                        <label  for="txt_email" class="col-sm-4 control-label">Correo</label>
                        <div class="col-sm-8">
                            <label for="txt_email" class="field-label field">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-envelope"></span>
                                    </div>
                                    <input type="text" class="gui-input" id="email" name="email" placeholder="Correo..."/>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="compañia" class="col-sm-4 control-label">Compañia</label>
                        <div class="col-sm-8">
                            <label class="field">
                                <input type="text" class="form-control gui-input" id="compañia" name="compañia" placeholder="Compañia...">
                            </label>
                        </div>                                    
                    </div>
                    <div class="form-group">
                        <label for="street" class="col-sm-4 control-label">Calle</label>
                        <div class="col-sm-8">
                            <label class="field">
                                <input type="text" class="form-control gui-input" id="street" name="street" placeholder="Calle...">
                            </label>
                        </div>                                    
                    </div>
                    <div class="form-group">
                        <label for="lat" class="col-sm-4 control-label">Latitud</label>
                        <div class="col-sm-8">
                            <label class="field">
                                <input type="text" class="form-control gui-input" id="lat" name="lat" placeholder="Latitud...">
                            </label>
                        </div>                                    
                    </div>
                    <div class="form-group">
                        <label for="lng" class="col-sm-4 control-label">Longitud</label>
                        <div class="col-sm-8">
                            <label class="field">
                                <input type="text" class="form-control gui-input" id="lng" name="lng" placeholder="Longitud...">
                            </label>
                        </div>                                    
                    </div>
                    {!! Form::close() !!}  
            </div>
        </div>
    </div>
</div>