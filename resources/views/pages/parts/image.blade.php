<div class="home-block position-relative" style="background-color: {{ $block->color }}">
    <div class="container py-5">
        <div class="row {{($key % 2 === 0) ? "flex-row-reverse" : ""}}">
            <div class="col-12">
                <img src="{{ asset('images/home/'.$block['image']) }}" alt="Block Image" class="w-100 h-auto invisible animated">
            </div>
        </div>
        @auth
            @include('admin/includes/admin-options')
        @endauth
    </div>
</div>