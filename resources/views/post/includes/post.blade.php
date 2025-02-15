<div class="card h-100">
    <img src="{{ $post->preview_image
                        ? asset('storage/' . $post->preview_image)
                        : 'public/dist/img/no-image-placeholder.png' }}"
         class="rounded-top img-fluid d-block"
         alt="Post {{ $post->title }} image"
         style="height: 360px; object-fit: cover">
    <div class="card-body d-flex flex-column">
        <p class="text-muted small mb-2" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
            {{ $post->category->name }}
        </p>

        <a href="{{ route('post.show', $post->id) }}" class="text-decoration-none text-dark">
            <h6 class="card-title" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                {{ $post->title }}
            </h6>
        </a>
    </div>
</div>
