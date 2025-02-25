@extends('layouts.main')

@section('title', $post->title)

<style>
    .metadata-item {
        margin-right: .3rem;
    }
</style>

@section('content')
    <div class="d-flex justify-content-center">
        <h1 class="display-4 font-weight-bold text-center">{{ $post->title }}</h1>
    </div>

    <div class="d-flex justify-content-center align-items-center mb-4">
        <p class="text-muted m-0">
            <span class="metadata-item">{{ $date }}</span>
            <span class="metadata-item">•</span>
            <span class="metadata-item">{{ $time }}</span>
            <span class="metadata-item">•</span>
            <span class="metadata-item">{{ $post->category->name }}</span>
            <span class="metadata-item">•</span>
            <span class="metadata-item">0 Comments</span>
            <span class="metadata-item">•</span>
            <span class="metadata-item">{{ $post->liked_users_count }} Likes</span>
            <span class="metadata-item">•</span>
        </p>
        @auth()
            <form class="mb-0 ml-1" method="post" action="{{ route('post.like.toggle', $post->id) }}">
                <button type="submit" class="border-0 bg-transparent shadow-none p-0" style="outline: none;">
                    @csrf
                    @if(auth()->user()->liked_posts->contains($post->id))
                        <i class="fas fa-heart" style="color: #e34a40; font-size: 1.25rem;"></i>
                    @else
                        <i class="far fa-heart" style="color: #e34a40; font-size: 1.25rem;"></i>
                    @endif
                </button>
            </form>
        @endauth
        @guest()
            <a href="{{ route('auth.login') }}" class="ml-1" style="color: #e34a40; font-size: 1.25rem;">
                <i class="far fa-heart"></i>
            </a>
        @endguest
    </div>

    <section class="mb-4 d-flex justify-content-center">
        <img src="{{ asset('storage/' . $post->preview_image) }}"
             onerror="this.onerror=null; this.src='{{ asset('dist/img/no-image-placeholder.png') }}'"
             alt="Post image" class="img-fluid rounded"
             style="max-width: 50%; height: auto;">
    </section>

    <hr/>

    <section class="mb-4">
        <div class="row justify-content-center">
            <small class="text-gray">
                Tags:
                @foreach($post->tags as $tag)
                    <span class="px-1 ml-1 bg-gray-light rounded">
                        {{ $tag->name }}
                    </span>
                @endforeach
            </small>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <article class="post-content">
                    {!! $post->content !!}
                </article>
            </div>
        </div>
    </section>

    @if($post->comments->count() > 0)
        <section class="comment-list mb-5">
            <h2 class="section-title mb-4">Comments</h2>
            @foreach($post->comments as $comment)
                <div class="card-comment p-3 my-4" style="border: 2px solid #fff0e8; border-radius: 25px;">
                    <div class="comment-text">
                        <div class="username">
                            <span style="font-weight: bold; font-size: 1.25rem">
                                {{ $comment->user->name }}
                            </span>
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
            @endforeach
        </section>
    @endif

    @auth()
        <section class="comment-section mb-5">
            <h2 class="section-title mb-5">Leave a Comment</h2>
            <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                @csrf
                <div class="row">
                    <div class="form-group col-12">
                        <label for="message" class="sr-only">Comment</label>
                        <textarea name="message" id="message" class="form-control"
                                  style="border-radius: 25px" placeholder="Message"
                                  rows="5" maxlength="4096"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="submit" value="Send Message" class="btn btn-warning">
                    </div>
                </div>
            </form>
        </section>
    @endauth
    @guest()
        <section class="comment-section mb-5">
            <h2 class="section-title mb-5" data-aos="fade-up">
                <a href="{{ route('auth.login') }}">Authorize</a>
                to Leave a Comment
            </h2>
        </section>
    @endguest
@endsection
