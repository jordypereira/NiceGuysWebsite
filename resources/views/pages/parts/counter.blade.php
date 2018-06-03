<div class="home-block position-relative" style="background-color: {{ $block->color }}">
    <div class="container py-5" id="counter_{{ $block->id }}">
        <div class="row">
            <div class="col-12">
                <div class="p-4 {{ ($block['font_color'] === "black") ? "border-black" : "border" }}">
                    <h2 class="mb-3 text-center kiddishmedium animated" style="color: {{ $block['font_color'] }}">{{ $block['title'] }}</h2>
                    <h2 class="mb-3 text-center count kiddishmedium animated" style="color: {{ $block['font_color'] }}" id="count-value">{{ $block['counter_value'] }}</h2>
                    <form method="POST" action="{{url('admin/counter', $block['id'] )}}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <input type="hidden" value="0" name="y-value">
                        <button type="submit" class="btn d-block mx-auto counter-btn animated" style="background-color: {{ $block['counter_color'] }}">
                            <span style="color: {{ $block['counter_font'] }}" class="count-btn">
                                {{ $block['counter_title'] }}
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @auth
            @include('admin/includes/admin-options')
        @endauth
    </div>
</div>