<div class="home-block position-relative {{($key % 2 === 0) ? "u-bg" : "u-bg-light"}}">
    <div class="container py-5">
        <div class="row {{($key % 2 === 0) ? "flex-row-reverse" : ""}}">
            <div class="col-12">
                <h2 class="animated invisible mb-3">{{ $block['title'] }}</h2>
                <div class="animated invisible">
                    {!! $block['text'] !!}
                </div>
            </div>
        </div>
        @auth
            @include('admin/includes/admin-options')
        @endauth
    </div>
</div>