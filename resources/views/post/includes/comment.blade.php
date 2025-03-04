<div class="card-comment p-3 mb-4" style="border: 2px solid #fff0e8; border-radius: 25px;">
    <div class="comment-text">
        <div class="username">
            <a
                href="{{ route('profile.show', $comment->user->id) }}"
                style="font-weight: bold; font-size: 1.25rem"
                class="text-dark" >
                {{ $comment->user->name }}
            </a>
            <span class="text-muted float-right">
                {{ $comment->created_at->diffForHumans() }}
            </span>
        </div>
        <div class="p-3">
            {{ $comment->message }}
        </div>
        @auth()
            @if($comment->user->id == auth()->user()->id)
                <div class="px-2 d-flex justify-content-end align-items-center">
                    <a class="ml-2 fas fa-pen text-warning" href="#"></a>
                    <form class="ml-2 m-0" action="#" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="border-0 bg-transparent" type="submit">
                            <a class="fas fa-trash text-warning" role="button"></a>
                        </button>
                    </form>
                </div>
            @endif
        @endauth
    </div>
</div>
