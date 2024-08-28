<ul class="dropdown-menu list-group dropdown-persist w250" role="menu">
    @if(auth()->user()->ver_menu_interno)
        <li class="list-group-item">
            <a href="{{get_module_prefix() ? route(get_module_prefix().'.profile.index',auth()->user()->personal_id) : route('profile.index',auth()->user()->personal_id)}}" target="_blank" class="animated animated-short fadeInUp">
                <span class="fa fa-user"></span> Mi Perfíl
            </a>
        </li>
        @if(auth()->user()->is_zamine_peru || auth()->user()->is_admin)
            @if(auth()->user()->ver_publicaciones || has_permission('conf.view-publish-general'))
                <li class="list-group-item">
                    <a href="{{get_module_prefix() ? route(get_module_prefix().'.publish.index') : route('publish.index')}}" target="_blank" class="animated animated-short fadeInUp">
                        <span class="fa fa-bell"></span> Publicaciones
                    </a>
                </li>
            @endif
            <li class="list-group-item">
                <a href="{{get_module_prefix() ? route(get_module_prefix().'.suggestion.index') : route('suggestion.index')}}" target="_blank" class="animated animated-short fadeInUp">
                    <span class="fa fa-envelope"></span> Buzón de sugerencias
                </a>
            </li>
            <!-- BLOQUE DE REQUERIMIENTOS EPP-->
            @if((auth()->user()->projectHasFlag('sol_req_epp') || has_permission('conf.view-solicitudes-epp')))
                <li class="list-group-item">
                    <a href="{{get_module_prefix() ? route(get_module_prefix().'.requirement-epp.index') : route('requirement-epp.index')}}" target="_blank" class="animated animated-short fadeInUp">
                        <span class="fa fa-list"></span> Requerimientos EPP
                    </a>
                </li>
                @if(auth()->user()->personal->has_personal_cargo || auth()->user()->is_admin)
                    <li class="list-group-item">
                        <a href="{{route('gl.requirement.epp.index')}}" target="_blank" class="animated animated-short fadeInUp">
                            <span class="fa fa-check"></span> Aprobacion Epp
                            @if(auth()->user()->quantity_requeriment_epp_emit > 0)
                                <span class='right badge badge-danger'>{{ auth()->user()->quantity_requeriment_epp_emit }}</span>
                            @endif
                        </a>
                    </li>
                @endif
            @endif

            <!-- FIN DE BLOQUE DE REQUERIMIENTOS EPP   -->

            <!-- BLOQUE DE REQUERIMIENTOS PERSONAL -->
            @if(auth()->user()->projectHasFlag('sol_req_personal') || has_permission('config.view-solicitudes-personal'))
                @if(auth()->user()->has_permission_request_personnel || has_permission('manage.requerimiento-personal.listar-todos') || has_permission('rh.generar-req-personal.excepcion'))
                    <li class="list-group-item">
                        <a href="{{route_pfx('requerimiento-personal.index')}}" target="_blank" class="animated animated-short fadeInUp">
                            <span class="fa fa-check"></span> Req. de Personal
                        </a>
                    </li>
                @endif

                @if(auth()->user()->has_permission_approve_request_personnel || has_permission('manage.requerimiento_personal.verificar_RRHH')  || has_permission('manage.requerimiento_personal.aprobar_GGENERAL') || auth()->user()->has_permission_approve_request_personnel_nv2)
                    <li class="list-group-item">
                        <a href="{{route('rh.requerimientos-personal.index')}}" target="_blank" class="animated animated-short fadeInUp">
                            <span class="fa fa-check"></span> Aprob. Req. Personal
                            @if(auth()->user()->cantidad_notificaciones_requerimiento_personal > 0)
                                <span class='right badge badge-danger'>{{ auth()->user()->cantidad_notificaciones_requerimiento_personal }}</span>
                            @endif
                        </a>
                    </li>
                @endif
            @endif
            <!-- FIN DE BLOQUE DE REQUERIMIENTOS PERSONAL   -->

            @if(auth()->user()->personal->has_personal_cargo || auth()->user()->is_admin)
                <li class="list-group-item">
                    <a href="{{route('act.control-ausentismo-all.index')}}" target="_blank" class="animated animated-short fadeInUp">
                        <span class="fa fa-check"></span>Solicitudes de Ausentismo
                        {{--@if(auth()->user()->quantity_requeriment_epp_emit > 0)
                        <span class='right badge badge-danger'>{{ auth()->user()->quantity_requeriment_epp_emit }}</span>
                        @endif--}}
                    </a>
                </li>
            @endif

            <li class="list-group-item">
                <a href="{{route_pfx('reporte-negativa-trabajo.index')}}" target="_blank" class="animated animated-short fadeInUp">
                    <span class="fa fa-check"></span>Reporte Negativa de trabajo
                </a>
            </li>

            @if(auth()->user()->personal->has_personal_cargo || auth()->user()->is_admin)
                <li class="list-group-item">
                    <a href="{{route('ss.reporte-negativa-trabajo.index')}}" target="_blank" class="animated animated-short fadeInUp">
                        <span class="fa fa-check"></span>Aceptacion Negativa de trabajo

                    </a>
                </li>
            @endif
            <li class="list-group-item">
                <a href="{{route('ti.incidentes-reportados.create')}}" target="_blank" class="animated animated-short fadeInUp">
                    <span class="fa fa-desktop"></span>Reportar incidente de TI
                </a>
            </li>
            <li class="list-group-item">
                <a href="{{route_pfx('qrcode.index')}}" target="_blank" class="animated animated-short fadeInUp">
                    <span class="fa fa-qrcode"></span> Código QR generado
                </a>
            </li>
            <li class="list-group-item">
                <a href="{{route('setting.security.index')}}" target="_blank" class="animated animated-short fadeInUp">
                    <span class="fa fa-cog"></span> Configuración
                </a>
            </li>
        @endif
    @endif
    <li class="dropdown-footer">
        <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <span class="fa fa-power-on pr5"></span> Logout
        </a>
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>
</ul>