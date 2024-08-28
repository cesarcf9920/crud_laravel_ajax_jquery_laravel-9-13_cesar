@if(isset($menu['children']))
    @if($menu['tipo_id'] == 35)
    <li class="content-menu-children group-general-menu">
        <a id="_{{$menu['id']}}" href="{{ $menu['url'] != '' ? route($menu['url']) : '' }}" class="{{ (isset($menu['children'])) ? 'accordion-toggle' : ''}} {{$menu['url'] != '' ? (route($menu['url']) == Request::url()?'active-menu':'') : ''}} module-parent">
            <span class="{{ $menu['icon'] }} menu-icon"></span>
            <span class="sidebar-title title-menu-main">{{ $menu['alias']=='' ? $menu['nombre'] : $menu['alias'] }}</span>
            <span class="caret"></span>
        </a>
        @if(isset($menu['children']))
        <ul class="nav sub-nav"> 
           @foreach($menu['children'] as $menu)
                <li class="">
                    <a id="_{{$menu['id']}}" data-parent="{{$menu['padre_id']}}" href="{{ $menu['url'] != '' ? route($menu['url']) : '' }}" 
                    class="{{ (isset($menu['children'])) ? 'accordion-toggle' : ''}} {{$menu['url'] != '' ? (route($menu['url']) == Request::url()?'active-menu':'') : ''}}"> 
                        <span class="{{ $menu['icon'] }} menu-icon"></span>
                        <span>{{ $menu['alias'] == '' ? $menu['nombre'] : $menu['alias'] }}</span>
                        @if(isset($menu['children']))
                            <span class="caret"></span>
                        </a>
                        <ul class="nav sub-nav" style="">
                            @foreach($menu['children'] as $menu)                           
                                @include('layouts.sidebars.sidebar-menu-sub', $menu)
                            @endforeach
                        </ul>
                        @else
                    </a>                    
                        @endif
                    
                </li>
            @endforeach 
        </ul>            
        @endif
    </li>    
    @endif
@endif