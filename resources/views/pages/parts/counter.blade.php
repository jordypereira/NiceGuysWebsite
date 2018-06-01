<div class="home-block position-relative" style="background-color: {{ $block->color }}">
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-3" style="color: {{ $block['font_color'] }}">{{ $block['title'] }}</h2>
                <h2 class="mb-3" style="color: {{ $block['font_color'] }}">{{ $block['counter_value'] }}</h2>
                <button class="btn" style="background-color: {{ $block['counter_color'] }}">
                    <span style="color: {{ $block['counter_font'] }}">
                        {{ $block['counter_title'] }}
                    </span>
                </button>
            </div>
        </div>
        @auth
            @include('admin/includes/admin-options')
        @endauth
    </div>
</div>