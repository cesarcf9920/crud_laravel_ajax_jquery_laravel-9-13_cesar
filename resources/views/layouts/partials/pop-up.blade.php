<style>
    .lb-nav a.lb-next,
    .lb-nav a.lb-prev {
        width: 10%;
        position: absolute;
        opacity: 1;
    }
    .lb-nav a.lb-next {
        right: -60px;
    }
    .lb-nav a.lb-prev {
        left: -60px;
    }
    .lb-caption {
        display: none !important;
    }
</style>
@php
    $popUps = get_pop_ups();
    $contador = 1;
@endphp
@if( !empty( $popUps ) )
    @foreach( $popUps as $popUp )
        @if (session()->has('notification_' . $popUp->id))
            @if(session()->get('notification_' . $popUp->id) === "false")
                @php
                    session(['notification_' . $popUp->id => "true"]);
                @endphp
                <div>
                    <a id="zamine-pop-up-{{ $popUp->id }}"
                       class="zamine-pop-up"
                       href="{{ route( 'rh.pop-up.show-file', $popUp->id ) }}"
                       data-lightbox="roadtrip"
                       data-url="{{ $popUp->url }}"
                       data-title="{{ $popUp->id }}"
                    ></a>
                </div>
                @php
                    $contador++;
                @endphp
            @endif
        @endif
    @endforeach
@endif
@if (session()->has('notification2'))
    @if(session()->get('notification2') == "false")
        @php
            session(['notification2' => "true"]);
        @endphp
        <div>
            <a class="example-image-link2" href="{{ asset('images/popup-ssoma.png') }}" data-lightbox="example-2"></a>
        </div>
    @endif
@endif