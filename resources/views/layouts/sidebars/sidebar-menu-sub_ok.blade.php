
    <li class="{{$menu['url'] != '' ? (route($menu['url']) == Request::url()?'menu-children-active':'') : ''}}">
        <a href="{{ $menu['url']!=''?route($menu['url']):'' }}"> 
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