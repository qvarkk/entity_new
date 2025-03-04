@extends('layouts.main')

@section('title', $user->name)

@section('content')
    <section class="mb-5">
        <div class="d-flex flex-row align-items-center p-3 border rounded" style="max-height: 256px; gap: 20px;">
            <img
                class="rounded me-3"
                src="{{ asset('dist/img/blank-profile-picture.png') }}"
                alt="Profile picture"
                style="width: 100px; height: 100px; object-fit: cover;"
            >

            <div class="flex-grow-1 me-3">
                <h3 class="mb-1">{{ $user->name }}</h3>
                <p class="mb-1 text-muted">User about me section</p>
                <small class="text-muted">Joined {{ $joined_year }}</small>
            </div>

            @auth()
                @if(auth()->user()->id == $user->id)
                    <div>
                        <a class="btn btn-primary" href="#">Edit Profile</a>
                    </div>
                @endif
            @endauth
        </div>
    </section>
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
