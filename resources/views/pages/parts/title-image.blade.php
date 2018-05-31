<div class="home-block position-relative {{($key % 2 === 0) ? "u-bg" : "u-bg-light"}}">
    <div class="container py-5">
        <div class="row {{($key % 2 === 0) ? "flex-row-reverse" : ""}}">
            <div class="col-12">
                <h2 class="animated invisible mb-3">{{ $block['title'] }}</h2>
            </div>
            <div class="col-12">
                <img src="{{ asset('images/home/'.$block['image']) }}" alt="Block Image" class="home-img invisible animated">
            </div>
        </div>
        @auth
            @include('admin/includes/admin-options')
        @endauth
    </div>
</div>