<div class="row">
    <div class="col-xs-12">
        <div class="card card-no-bottom-line admin-form">
            <div class="side-body"></div>
                <div class="card-body">            
                {!! Form::open( ['class' => 'form-horizontal form-modal-left', 'id' => 'form-show' ]) !!}                         
                    <div class="form-group">
                        <label for="name" class="col-sm-4 control-label">Nombre</label>
                        <div class="col-sm-8">
                            <label class="field">
                                <input type="text" class="form-control gui-input" readonly="true" id="name" name="name" placeholder="Nombre" value="{{$usuario->name}}">    
                            </label>                            
                        </div>                                    
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-sm-4 control-label">Teléfono</label>
                        <div class="col-sm-8">
                            <label class="field">
                                <input type="text" class="form-control gui-input" readonly="true" id="phone" name="phone" placeholder="Teléfono" value="{{$usuario->phone}}">    
                            </label>                            
                        </div>                                    
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-4 control-label">Correo</label>
                        <div class="col-sm-8">
                            <label class="field">
                                <input type="text" class="form-control gui-input" readonly="true" id="email" name="email" placeholder="Correo" value="{{$usuario->email}}">    
                            </label>                            
                        </div>                                    
                    </div>
                    <div class="form-group">
                        <label for="compañia" class="col-sm-4 control-label">Compañia</label>
                        <div class="col-sm-8">
                            <label class="field">
                                <input type="text" class="form-control gui-input only_decimal" readonly="true" id="compañia" name="compañia" placeholder="Compañia" value="{{$usuario->compañia}}">    
                            </label>                            
                        </div>                                    
                    </div>
                    <div class="form-group">
                        <label for="street" class="col-sm-4 control-label">Estado</label>
                        <div class="col-sm-8">
                            <label class="field">
                                <input type="text" class="form-control gui-input only_decimal" readonly="true" id="street" name="street" placeholder="Calle" value="{{$usuario->street}}">    
                            </label>                            
                        </div>                                    
                    </div>
                {!! Form::close() !!}  
                </div>
            </div>
        </div>
    </div>
</div>