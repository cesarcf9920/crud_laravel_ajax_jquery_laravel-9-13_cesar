@php
    $user = auth()->user();
    $isZamineOrAdmin = $user->is_zamine_peru || $user->is_admin;
    $hasStaffInCharge = $user->personal->has_personal_cargo || $user->is_admin;
    $requirementEppPermission = $user->projectHasFlag('sol_req_epp') || has_permission('conf.view-solicitudes-epp');
    $solReqPersonnelPermission = $user->projectHasFlag('sol_req_personal')
        || has_permission('config.view-solicitudes-personal');
    $permissionRequestPersonnel = $user->has_permission_request_personnel
        || has_permission('manage.requerimiento-personal.listar-todos')
        || has_permission('rh.generar-req-personal.excepcion');
    $permissionApproveRequestPersonnel = $user->has_permission_approve_request_personnel
        || has_permission('manage.requerimiento_personal.verificar_RRHH')
        || has_permission('manage.requerimiento_personal.aprobar_GGENERAL')
        || $user->has_permission_approve_request_personnel_nv2;
    $absenteeismPermission = $user->personal->has_personal_cargo || $user->is_admin;
@endphp
<div class="options-container" role="menu">
    <div class="menu-principal">
        <div class="menu-title">
            <div class="menu-name-user">
                {{ Auth::user()->short_name }}
            </div>
            <span class="menu-name-close material-symbols-outlined close-menu">close</span>
        </div>
        <div class="menu-wrapper">
            <div class="menu-wrapper-box">
                @if(auth()->user()->ver_menu_interno)
                    <div class="menu-wrapper-item js-menu-wrapper-item" data-name="my-profile">
                        <div class="menu-wrapper-item-box">
                            <span class="menu-wrapper-item-box-icon material-symbols-outlined">arrow_back_ios</span>
                            <div class="menu-wrapper-item-box-title">Mi Perfil</div>
                        </div>
                    </div>
                    @if($isZamineOrAdmin)
                        @php
                            $user = auth()->user();
                            $showPublications = $user->ver_publicaciones || has_permission('conf.view-publish-general');
                            $suggestionsMailbox=get_module_prefix() ? route(get_module_prefix().'.suggestion.index') : route('suggestion.index');
                        @endphp
                        @if($showPublications)
                            @php
                                $urlPublications = get_module_prefix()
                                    ? route(get_module_prefix().'.publish.index')
                                    : route('publish.index');
                            @endphp
                            <div class="menu-wrapper-item js-menu-wrapper-item js-has-no-children">
                                <div class="menu-wrapper-item-box">
                                    <div class="menu-wrapper-item-box-title">
                                        <a href="{{ $urlPublications }}" target="_blank">Publicaciones</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="menu-wrapper-item js-menu-wrapper-item js-has-no-children">
                            <div class="menu-wrapper-item-box">
                                <div class="menu-wrapper-item-box-title">
                                    <a href="{{ $suggestionsMailbox }}" target="_blank">Buzón de Sugerencias</a>
                                </div>
                            </div>
                        </div>
                        @if($requirementEppPermission)
                            <div class="menu-wrapper-item js-menu-wrapper-item" data-name="requirement-epp">
                                <div class="menu-wrapper-item-box">
                                    <span class="menu-wrapper-item-box-icon material-symbols-outlined">arrow_back_ios</span>
                                    <div class="menu-wrapper-item-box-title">Requerimientos EPP</div>
                                </div>
                            </div>
                        @endif
                        @if($solReqPersonnelPermission)
                            @if($permissionRequestPersonnel || $permissionApproveRequestPersonnel)
                                <div class="menu-wrapper-item js-menu-wrapper-item" data-name="requirement-personnel">
                                    <div class="menu-wrapper-item-box">
                                        <span class="menu-wrapper-item-box-icon material-symbols-outlined">arrow_back_ios</span>
                                        <div class="menu-wrapper-item-box-title">Req. de Personal</div>
                                    </div>
                                </div>
                            @endif
                        @endif
                        @if($absenteeismPermission)
                            <div class="menu-wrapper-item js-menu-wrapper-item" data-name="absenteeism">
                                <div class="menu-wrapper-item-box">
                                    <span class="menu-wrapper-item-box-icon material-symbols-outlined">arrow_back_ios</span>
                                    <div class="menu-wrapper-item-box-title">Ausentismos</div>
                                </div>
                            </div>
                        @endif
                        <div class="menu-wrapper-item js-menu-wrapper-item" data-name="racs">
                            <div class="menu-wrapper-item-box">
                                <span class="menu-wrapper-item-box-icon material-symbols-outlined">arrow_back_ios</span>
                                <div class="menu-wrapper-item-box-title">RACS</div>
                            </div>
                        </div>
                        <div class="menu-wrapper-item js-menu-wrapper-item" data-name="refusal-of-work">
                            <div class="menu-wrapper-item-box">
                                <span class="menu-wrapper-item-box-icon material-symbols-outlined">arrow_back_ios</span>
                                <div class="menu-wrapper-item-box-title">Negativa de trabajo</div>
                            </div>
                        </div>
                        <div class="menu-wrapper-item js-menu-wrapper-item js-has-no-children">
                            <div class="menu-wrapper-item-box">
                                <div class="menu-wrapper-item-box-title">
                                    <a href="{{ route('sg.requirement-services.create') }}" target="_blank">Solicitar servicio - SSGG</a>
                                </div>
                            </div>
                        </div>
                        <div class="menu-wrapper-item js-menu-wrapper-item js-has-no-children">
                            <div class="menu-wrapper-item-box">
                                <div class="menu-wrapper-item-box-title">
                                    <a href="{{ route('ti.incidentes-reportados.create') }}" target="_blank">Reportar incidente de TI</a>
                                </div>
                            </div>
                        </div>
                        <div class="menu-wrapper-item js-menu-wrapper-item js-has-no-children">
                            <div class="menu-wrapper-item-box">
                                <div class="menu-wrapper-item-box-title">
                                    <a href="{{ route('setting.security.index') }}" target="_blank">Configuración</a>
                                </div>
                            </div>
                        </div>
                    @endif

                @endif
            </div>
        </div>
        <div class="menu-logout">
            <a href="{{ url('/logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            >
                <span class="material-symbols-outlined">logout</span> Cerrar sesión
            </a>
        </div>
    </div>
    @if(auth()->user()->ver_menu_interno)
        <div class="menu-secondary">
            <div class="menu-secondary-go-to-back-container">
                <a class="got-to-back-left got-to-back" href="javascript:void(0);">
                    <span class="material-symbols-outlined">arrow_back_ios</span>
                    <span class='got-to-back-left-text'>Volver al menú principal</span>
                </a>
                <a class="got-to-back-right close-menu" href="javascript:void(0)">
                    <span class="material-symbols-outlined">close</span>
                </a>
            </div>
            {{--        por cada menu padre debe de tener esta sección--}}
            <div class="menu-secondary-container js-menu-secondary-container" id="my-profile">
                @php
                    $urlProfile = get_module_prefix()
                        ? route(get_module_prefix().'.profile.index',auth()->user()->personal_id)
                        : route('profile.index',auth()->user()->personal_id);
                @endphp
                <div class="menu-secondary-title-container">
                    <div class="title-content">
                        <a href="javascript:void(0);">Mi Perfil</a>
                        <span class="material-symbols-outlined">account_circle</span>
                    </div>
                </div>
                <div class="menu-secondary-items-container">
                    <div class="menu-secondary-items-box">
                        <ul class="menu-secondary-items-categories">
                            <li class="category-header">Mi Perfil</li>
                            <li>
                                <a href="{{ $urlProfile }}" target="_blank">Mi Perfíl</a>
                            </li>
                        </ul>
                        @if($isZamineOrAdmin)
                            <ul class="menu-secondary-items-categories">
                                <li class="category-header">Código QR generado</li>
                                <li>
                                    <a href="{{ route_pfx('qrcode.index') }}">Código QR generado</a>
                                </li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
            <div class="menu-secondary-container js-menu-secondary-container" id="racs">
                <div class="menu-secondary-title-container">
                    <div class="title-content">
                        <a href="#">RACS</a>
                        <span class="material-symbols-outlined">summarize</span>
                    </div>
                </div>
                <div class="menu-secondary-items-container">
                    <div class="menu-secondary-items-box">
                        <ul class="menu-secondary-items-categories">
                            <li class="category-header">RACs</li>
                            <li>
                                <a href="{{ route_pfx('racs.create') }}" target="_blank">Registrar RAC</a>
                            </li>
                            <li>
                                <a href="{{ route_pfx('racs.index') }}" target="_blank">Mis RACS Registrados</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @if($requirementEppPermission)
                <div class="menu-secondary-container js-menu-secondary-container" id="requirement-epp">
                @php
                    $urlRequirementEpp = get_module_prefix()
                        ? route(get_module_prefix().'.requirement-epp.index')
                        : route('requirement-epp.index');
                @endphp
                <div class="menu-secondary-title-container">
                    <div class="title-content">
                        <a href="javascript:void(0);">Requerimientos EPP</a>
                        <span class="material-symbols-outlined">package_2</span>
                    </div>
                </div>
                <div class="menu-secondary-items-container">
                    <div class="menu-secondary-items-box">
                        <ul class="menu-secondary-items-categories">
                            <li class="category-header">EPP</li>
                            <li>
                                <a href="{{ $urlRequirementEpp }}" target="_blank">Requerimientos EPP</a>
                            </li>
                            @if($hasStaffInCharge)
                                <li>
                                    <a href="{{ route('gl.requirement.epp.index') }}" target="_blank">
                                        Aprobacion Epp
                                        @if($user->quantity_requeriment_epp_emit > 0)
                                            <span class='right badge badge-danger'>{{ $user->quantity_requeriment_epp_emit }}</span>
                                        @endif
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            @endif
            @if($solReqPersonnelPermission)
                @if($permissionRequestPersonnel || $permissionApproveRequestPersonnel)
                    <div class="menu-secondary-container js-menu-secondary-container" id="requirement-personnel">
                        <div class="menu-secondary-title-container">
                            <div class="title-content">
                                <a href="javascript:void(0);">Requerimiento de personal</a>
                                <span class="material-symbols-outlined">groups</span>
                            </div>
                        </div>
                        <div class="menu-secondary-items-container">
                            <div class="menu-secondary-items-box">
                                <ul class="menu-secondary-items-categories">
                                    <li class="category-header">Requerimiento de personal</li>
                                    @if($permissionRequestPersonnel)
                                        <li>
                                            <a href="{{ route_pfx('requerimiento-personal.index') }}" target="_blank">
                                                Req. de Personal
                                            </a>
                                        </li>
                                    @endif
                                    @if($permissionApproveRequestPersonnel)
                                        <li>
                                            <a href="{{ route('rh.requerimientos-personal.index') }}" target="_blank">
                                                Aprob. Req. Personal
                                                @if($user->cantidad_notificaciones_requerimiento_personal > 0)
                                                    <span class='right badge badge-danger'>{{ $user->cantidad_notificaciones_requerimiento_personal }}</span>
                                                @endif
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
            @if($absenteeismPermission)
                <div class="menu-secondary-container js-menu-secondary-container" id="absenteeism">
                    <div class="menu-secondary-title-container">
                        <div class="title-content">
                            <a href="javascript:void(0);">Ausentismos</a>
                            <span class="material-symbols-outlined">clinical_notes</span>
                        </div>
                    </div>
                    <div class="menu-secondary-items-container">
                        <div class="menu-secondary-items-box">
                            <ul class="menu-secondary-items-categories">
                                <li class="category-header">Solicitudes de Ausentismo</li>
                                <li>
                                    <a href="{{ route('act.control-ausentismo-all.index') }}" target="_blank">Solicitudes de Ausentismo</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
            <div class="menu-secondary-container js-menu-secondary-container" id="refusal-of-work">
                <div class="menu-secondary-title-container">
                    <div class="title-content">
                        <a href="#">Negativas de trabajos</a>
                        <span class="material-symbols-outlined">engineering</span>
                    </div>
                </div>
                <div class="menu-secondary-items-container">
                    <div class="menu-secondary-items-box">
                        <ul class="menu-secondary-items-categories">
                            <li class="category-header">Negativas de trabajos</li>
                            <li>
                                <a href="{{ route_pfx('reporte-negativa-trabajo.index') }}" target="_blank">
                                    Reporte Negativa de trabajo
                                </a>
                            </li>
                            @if($hasStaffInCharge)
                                <li>
                                    <a href="{{ route('ss.reporte-negativa-trabajo.index') }}" target="_blank">
                                        Aceptación Negativa de trabajo
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="menu-logout">
                <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span class="material-symbols-outlined">logout</span> Cerrar sesión
                </a>
            </div>
        </div>
    @endif
</div>
<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>