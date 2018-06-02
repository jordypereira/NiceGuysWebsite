<div class="home-block position-relative" style="background-color: {{ $block->color }}">
    <div class="container py-5">
        <div class="row {{($key % 2 === 0) ? "flex-row-reverse" : ""}}">
            <div class="col-xs-12 col-md-12 col-lg-6">
                <h2 class="animated invisible mb-3 homeblock-title kiddishmedium" style="color: {{ $block['font_color'] }}">{{ $block['title'] }}</h2>
                <div class="animated invisible homeblock-text" style="color: {{ $block['font_color'] }}">
                    {!! $block['text'] !!}
                </div>
            </div>
            <div class="col-xs-12 col-md-12 col-lg-6 d-flex flex-center mt-sm-4 mt-md-0 mt-lg-0">
                <img src="{{ asset('images/home/'.$block['image']) }}" alt="Block Image" class="home-img invisible animated">
            </div>
        </div>
        @auth
            @include('admin/includes/admin-options')
        @endauth
    </div>
</div>