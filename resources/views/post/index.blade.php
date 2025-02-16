@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <h2 class="my-3">Recent Posts</h2>
    <div class="container">
        <div class="row">
            @foreach($recent_posts as $post)
                <div class="col-md-4 mb-4">
                    @include('post.includes.post', $post)
                </div>
            @endforeach
        </div>
        <div class="row d-flex" style="justify-content: center">
            {{ $recent_posts->links() }}
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <section>
                    <h3 class="my-3">Popular Posts</h3>
                    <div class="row">
                        @foreach($trending_posts as $post)
                            <div class="col-md-6 mb-4">
                                @include('post.includes.post', $post)
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
            <div class="col-md-4">
                <div class="mb-4 d-flex flex-column">
                    <h3 class="my-3">Recommended</h3>
                    <div class="list-group">
                        @foreach($random_posts as $post)
                            <a href="{{ route('post.show', $post->id) }}"
                               class="list-group-item list-group-item-action d-flex gap-3">
                                <img src="{{ asset('storage/' . $post->preview_image) }}"
                                     alt="{{ $post->title }}"
                                     class="rounded mr-2"
                                     style="width: 60px; height: 60px; object-fit: cover">
                                <div class="d-flex flex-column w-100">
                                    <h6 class="mb-1">{{ $post->title }}</h6>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                                        @include('post.includes.like')
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
