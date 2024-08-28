<li class="{{$menu['url'] != '' ? (route($menu['url']) == Request::url()?'menu-children-active':'') : ''}}">
    <a id="_{{$menu['id']}}" data-parent="{{$menu['padre_id']}}" href="{{ $menu['url']!=''?route($menu['url']):'' }}" class="{{ (isset($menu['children'])) ? 'accordion-toggle' : ''}} {{$menu['url'] != '' ? (route($menu['url']) == Request::url()?'active-menu':'') : ''}}"> 
        <div class="row">
            <div class="col-md-1" style="font-size: 11px;">
                <span class="{{ $menu['icon'] }}"></span>
            </div>
            <div class="col-md-10">
                <span>{{ $menu['alias']==''?$menu['nombre']:$menu['alias'] }}</span>
            </div>
        </div> 
    </a>
</li>