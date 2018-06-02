<div class="home-block position-relative" style="background-color: {{ $block->color }}">
    <div class="container py-5">
        <div class="row {{($key % 2 === 0) ? "flex-row-reverse" : ""}}">
            <div class="col-12">
                <h2 class="animated invisible mb-3 homeblock-title" style="color: {{ $block['font_color'] }}">{{ $block['title'] }}</h2>
                <div class="animated invisible kids-cornerregular homeblock-text" style="color: {{ $block['font_color'] }}">
                    {!! $block['text'] !!}
                </div>
            </div>
        </div>
        @auth
            @include('admin/includes/admin-options')
        @endauth
    </div>
</div>