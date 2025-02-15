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
            <span class="metadata-item">0 Likes</span>
            <span class="metadata-item">•</span>
        </p>
        <form action="#" class="mb-0 ml-1" method="post">
            @csrf
            <button type="submit" class="border-0 bg-transparent shadow-none p-0" style="outline: none;">
                @auth()
                    <i class="far fa-heart" style="color: #e34a40; font-size: 1.25rem;"></i>
                @endauth
            </button>
        </form>
    </div>

    <section class="mb-5 d-flex justify-content-center">
        <img src="{{ $post->preview_image
                        ? asset('storage/' . $post->preview_image)
                        : 'dist/img/no-image-placeholder.png' }}"
             alt="Post image" class="img-fluid rounded"
             style="max-width: 50%; height: auto;">
    </section>

    <hr/>

    <section class="my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <article class="post-content">
                    {!! $post->content !!}
                </article>
            </div>
        </div>
    </section>
@endsection
