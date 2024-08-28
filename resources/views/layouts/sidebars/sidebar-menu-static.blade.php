    <ul class="nav sidebar-menu">
    <li class="sidebar-label pt20">Detenciones</li>
    <li>
        <a href="{{ route('detention.index') }}">
          <span class="glyphicon glyphicon-scale"></span>
          <span class="sidebar-title">Lista de Detenciones</span>
        </a>
    </li>
    <li>
        <a class="accordion-toggle" href="#">
            <span class="fa fa-bar-chart-o"></span>
            <span class="sidebar-title">Reportes</span>
            <span class="caret"></span>
        </a>
        <ul class="nav sub-nav">
            <li>
                <a href="{{ route('report.detention.monthly-availability.index') }}"> 
                    <div class="row">
                        <div class="col-md-1" style="font-size: 11px;">
                            <span class="glyphicon glyphicon-unchecked"></span>
                        </div>
                        <div class="col-md-10">
                            <span> RPT1: Disponibilidad mensual </span>
                        </div>
                    </div> 
                </a>
            </li>
            <li>
                <a href="{{ route('report.detention.machine-availability.index') }}"> 
                    <div class="row">
                        <div class="col-md-1" style="font-size: 11px;">
                            <span class="glyphicon glyphicon-unchecked"></span>
                        </div>
                        <div class="col-md-10">
                            <span> RPT2: Disponibilidad máquina </span>
                        </div>
                    </div>        
                </a>
            </li>
            <li>
                <a href="{{ route('report.detention.indicator-availability.index') }}"> 
                    <div class="row">
                        <div class="col-md-1" style="font-size: 11px;">
                            <span class="glyphicon glyphicon-unchecked"></span>
                        </div>
                        <div class="col-md-10">
                            <span> RPT3: Indicadores de disponibilidad </span>
                        </div>
                    </div>   
                </a>
            </li>
            <li>
                <a href="{{ route('report.detention.top-maintenance.index') }}"> 
                    <div class="row">
                        <div class="col-md-1" style="font-size: 11px;">
                            <span class="glyphicon glyphicon-unchecked"></span>
                        </div>
                        <div class="col-md-10">
                            <span> RPT4: TOP 10 Mantenimientos </span>
                        </div>
                    </div>  
                </a>
            </li>
            <li>
                <a href="{{ route('report.detention.after-pm-index') }}"> 
                    <div class="row">
                        <div class="col-md-1" style="font-size: 11px;">
                            <span class="glyphicon glyphicon-unchecked"></span>
                        </div>
                        <div class="col-md-10">
                            <span> RPT5: Detenciones posterior a PM </span>
                        </div>
                    </div>  
                </a>
            </li>
            <li>
                <a href="{{ route('report.detention.status-availability.index') }}">  
                    <div class="row">
                        <div class="col-md-1" style="font-size: 11px;">
                            <span class="glyphicon glyphicon-unchecked"></span>
                        </div>
                        <div class="col-md-10">
                            <span> RPT6: Estado de disponibilidad </span>
                        </div>
                    </div>  
                </a>
            </li>
        </ul>
    </li>
    <li class="sidebar-label pt20">Garantías</li>
    <li>
        <a href="{{ route('warranty.index') }}">
          <span class="glyphicon glyphicon-scale"></span>
          <span class="sidebar-title">Lista de Grantías</span>
        </a>
    </li>
    <li>
        <a class="accordion-toggle" href="#">
            <span class="fa fa-bar-chart-o"></span>
            <span class="sidebar-title">Reportes</span>
            <span class="caret"></span>
        </a>
        <ul class="nav sub-nav">
            <li>
                <a href="{{ route('report.warranty.guarantees-presented.index') }}"> 
                    <div class="row">
                        <div class="col-md-1" style="font-size: 11px;">
                            <span class="glyphicon glyphicon-unchecked"></span>
                        </div>
                        <div class="col-md-10">
                            <span> RPT1: Garantías presentadas </span>
                        </div>
                    </div> 
                </a>
            </li>
            <li>
                <a href="{{ route('report.warranty.guarantees-approved.index') }}"> 
                    <div class="row">
                        <div class="col-md-1" style="font-size: 11px;">
                            <span class="glyphicon glyphicon-unchecked"></span>
                        </div>
                        <div class="col-md-10">
                            <span> RPT2: Tendencia valorizada de garantías aprobadas</span>
                        </div>
                    </div>        
                </a>
            </li>
            <li>
                <a href="{{ route('report.warranty.project-approved.index') }}"> 
                    <div class="row">
                        <div class="col-md-1" style="font-size: 11px;">
                            <span class="glyphicon glyphicon-unchecked"></span>
                        </div>
                        <div class="col-md-10">
                            <span> RPT3: Garantías aprobadas por operación </span>
                        </div>
                    </div>   
                </a>
            </li>
        </ul>
    </li>
    <li class="sidebar-label pt20">Menu</li>
    <li>
        <a href="{{ route('model.index') }}">
            <span class="glyphicon glyphicon-unchecked"></span>
            <span class="sidebar-title">Modelos</span>
        </a>
    </li>
    <li>
        <a href="{{ route('project.index') }}">
            <span class="glyphicon glyphicon-folder-close"></span>
            <span class="sidebar-title">Operaciones</span>
        </a>
    </li>
    <li>
        <a href="{{ route('equipment.index') }}">
          <span class="fa fa-train"></span>
          <span class="sidebar-title">Equipos</span>
        </a>
    </li>
    <li class="sidebar-label pt15">Seguridad</li>
          <li>
            <a class="accordion-toggle" href="#">
              <span class="fa fa-shield"></span>
              <span class="sidebar-title">Seguridad</span>
              <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
              <li>
                <a href="{{ route('security.user.index') }}">
                  <span class="glyphicon glyphicon-unchecked"></span> Usuarios</a>
              </li>
              <li>
                <a href="{{ route('security.index') }}">
                  <span class="glyphicon glyphicon-unchecked"></span> Asignacion de Operaciones</a>
              </li>
              <li>
                <a href="{{ route('security.permission.create') }}">
                  <span class="glyphicon glyphicon-unchecked"></span> Permisos de Usuario</a>
              </li>
            </ul>
          </li>

          <li class="sidebar-label pt15">Configuración</li>
          <li>
            <a class="accordion-toggle" href="#">
              <span class="fa fa-gears"></span>
              <span class="sidebar-title">Configuración</span>
              <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
              <li>
                <a href="#">
                  <span class="glyphicon glyphicon-unchecked"></span> Parametros</a>
              </li>
            </ul>
          </li>
</ul>