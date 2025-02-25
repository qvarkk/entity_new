<div class="card h-100">
    <img src="{{ asset('storage/' . $post->preview_image) }}"
         onerror="this.onerror=null; this.src='{{ asset('dist/img/no-image-placeholder.png') }}'"
         class="rounded-top img-fluid d-block"
         alt="Post {{ $post->title }} image"
         style="height: 360px; object-fit: cover">
    <div class="card-body d-flex">
        <div class="w-100">
            <p class="text-muted small mb-2" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                {{ $post->category->name }}
            </p>

            <a href="{{ route('post.show', $post->id) }}" class="text-decoration-none text-dark">
                <h6 class="card-title" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                    {{ $post->title }}
                </h6>
            </a>
        </div>

        @include('post.includes.like')
    </div>
</div>
