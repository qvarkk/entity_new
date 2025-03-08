@extends('layouts.main')

@section('title', 'Edit comment')

<script>
    function textCounter(textArea, counterId = 'counter', limit = 4096)
    {
        let counter = document.querySelector(`#${counterId}`);
        counter.innerHTML = `${textArea.value.length}/${limit}`;

        if ( textArea.value.length >= limit ) {
            counter.classList.add('text-danger');
            return false;
        } else {
            counter.classList.remove('text-danger');
        }
    }
</script>

@section('content')
<section class="comment-section mb-5">
    <a href="{{ route('post.show', $comment->post->id) }}" class="fa fa-arrow-left text-dark mb-2">&nbsp; Back</a>
    <h2 class="section-title mb-5">Update Comment</h2>
    <form action="{{ route('post.comment.update', $comment->id) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="form-group col-12">
                <label for="message" class="sr-only">Comment</label>
                <textarea oninput="textCounter(this);"
                          name="message" id="message" class="form-control"
                          style="border-radius: 25px" placeholder="Message"
                          rows="5" maxlength="4096">{{ $comment->message }}</textarea>
                @error('message')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                <span class="float-right" id="counter">0/4096</span>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <input type="submit" value="Save Message" class="btn btn-warning">
            </div>
        </div>
    </form>
</section>
@endsection
