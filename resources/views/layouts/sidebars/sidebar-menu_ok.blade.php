@if(isset($menu['children']))
    @if($menu['tipo_id'] == 35)
        <li class="sidebar-label pt20 module-parent">{{ $menu['alias']=='' ? $menu['nombre'] : $menu['alias'] }}</li>    
        @if(isset($menu['children']))
            @foreach($menu['children'] as $menu)        
                <li class="content-menu-children">
                    <a href="{{ $menu['url'] != '' ? route($menu['url']) : '' }}" class="{{ (isset($menu['children'])) ? 'accordion-toggle' : ''}} {{$menu['url'] != '' ? (route($menu['url']) == Request::url()?'active-menu':'') : ''}}" >
                        <span class="{{ $menu['icon'] }} menu-icon"></span>
                        <span class="sidebar-title">{{ $menu['alias'] == '' ? $menu['nombre'] : $menu['alias'] }}</span>
                @if(isset($menu['children']))
                        <span class="caret"></span>
                    </a>
                    <ul class="nav sub-nav">
                    @foreach($menu['children'] as $menu)                           
                        @include('layouts.sidebars.sidebar-menu-sub', $menu)
                    @endforeach
                    </ul>
                @else
                    </a>
                </li>
                @endif      
            @endforeach
        @endif
    @endif
@endif








