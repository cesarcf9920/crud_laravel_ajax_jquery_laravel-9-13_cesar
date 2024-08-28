

@if(session()->has('message'))
    <div class="alert alert alert-border-bottom alert-system bg-gradient alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="fa fa-check pr10"></i>
        <strong>Éxito!</strong> 
        <a href="#" class="alert-link">{{ session()->get('message') }}</a>
    </div>
@elseif(session()->has('info_message'))
    <div class="alert alert alert-border-bottom alert-info bg-gradient alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="fa fa-info pr10"></i>
        <strong>Información!</strong> 
        <a href="#" class="alert-link">{{ session()->get('info_message') }}</a>
    </div>
@elseif(session()->has('alert_config'))
    <div class="alert alert-border-bottom alert-custom bg-gradient alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="fa fa-info pr10"></i>
        <strong>Información!</strong>
        <a href="#" class="alert-link">{{ session()->get('alert_config') }}</a>
    </div>
@elseif(session()->has('error_message'))
    <div class="alert alert alert-border-bottom alert-danger bg-gradient alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="fa fa-info pr10"></i>
        <strong>Alerta!</strong> 
        <a href="#" class="alert-link">{{ session()->get('error_message') }}</a>
    </div>
@elseif(session()->has('warning_message'))
    <div class="alert alert alert-border-bottom alert-warning bg-gradient alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="fa fa-info pr10"></i>
        <strong>Advertencia!</strong> 
        <a href="#" class="alert-link">{{ session()->get('warning_message') }}</a>
    </div>
@elseif($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-sm alert-border-left alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="fa fa-warning pr10"></i>
            <strong>Error!</strong> 
            <a href="#" class="alert-link">{{ $error }}</a>
        </div>
    @endforeach
@endif
