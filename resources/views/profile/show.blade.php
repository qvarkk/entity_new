@extends('layouts.main')

@section('title', $user->name)

@section('content')
    @if($comments_count > 0)
        <section class="comment-list mb-5">
            <h2 class="mb-4">Comments ({{ $comments_count }})</h2>
            @foreach($comments as $comment)
                <span>
                    On post:
                    <a href="{{ route('post.show', $comment->post->id) }}">
                        {{ $comment->post->title }}
                    </a>
                </span>
                @include('post.includes.comment', $comment)
            @endforeach
        </section>
    @else
        <section class="comment-list mb-5">
            <h2 class="mb-4">Comments ({{ $comments_count }})</h2>
            <div class="p-3 my-4">
                <span style="font-weight: 500; font-size: 1.25rem">
                    This user has no comments.
                </span>
            </div>
        </section>
    @endif
@endsection
