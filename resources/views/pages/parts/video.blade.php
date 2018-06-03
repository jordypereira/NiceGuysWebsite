<div class="video-wrapper py-5 position-relative" style="background-color: {{ $block->color }}">
    <div class="container">
        <iframe
                {{--width="1280"--}}
                height="600"
                class="w-100 d-none"
                src="{{$block['video']}}"
                frameborder="0"
                allow="autoplay; encrypted-media"
                allowfullscreen>
        </iframe>
    </div>
    @auth
        @include('admin/includes/admin-options')
    @endauth
</div>