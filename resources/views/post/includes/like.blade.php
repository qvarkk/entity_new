@auth()
    <form action="{{ route('post.like.toggle', $post->id) }}" method="post">
        @csrf
        <button type="submit" class="border-0 bg-transparent shadow-none d-flex flex-column align-items-center"
                style="outline: none;">
            @if(auth()->user()->liked_posts->contains($post->id))
                <i class="fas fa-heart"
                   style="color: #e34a40; font-size: 1.5rem;"></i>
            @else
                <i class="far fa-heart"
                   style="color: #e34a40; font-size: 1.5rem;"></i>
            @endif
            <span>{{ $post->liked_users_count }}</span>
        </button>
    </form>
@endauth
@guest()
    <form action="{{ route('auth.login') }}">
        <button type="submit" class="border-0 bg-transparent shadow-none"
                style="outline: none;">
            <i class="far fa-heart" style="color: #e34a40; font-size: 1.5rem;"></i>
            <span>{{ $post->liked_users_count }}</span>
        </button>
    </form>
@endguest
