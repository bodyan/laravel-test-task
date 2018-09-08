@extends('layouts.app')

@section('title', ' - '.$post->title)

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-preview">
            <h2 class="post-title">
            {{ $post->title }}
            </h2>
            <p class="small post-meta">Posted by
              <a href="#">Start Bootstrap</a>
              on July 8, 2018
                <a href="{{ route('post.edit', ['id' => $post->id]) }}">[Edit]</a>
                <a href="{{ route('post.delete', ['id' => $post->id]) }}" onclick="return confirm('Really delete this Post?')">[Delete]</a>
            </p>
              <p class="post-subtitle">
                {!! $post->body !!}
              </p>
            </div>

        <div class="well">
        @include('layouts.errors')
        <h4>What is on your mind?</h4>
            <form  method="POST" action="{{ route('comments.create', ['post' => $post->id]) }}">
                @csrf
                <div class="form-group">
                    <input type="textarea" class="form-control" id="userComment" placeholder="Write your message here..." name="comment" required>
                </div>
                <button type="submit" class="btn btn-primary">
                    {{ __('Add Comment') }}
                </button>
            </form>    
            <hr>
            <ul id="sortable" class="list-unstyled ui-sortable">
                @foreach($post->comments as $comment)
                <strong class="pull-left primary-font">James</strong>
                <small class="pull-right text-muted">
                   <span class="glyphicon glyphicon-time"></span>7 mins ago
                </small>
                </br>
                <li class="ui-state-default"> {{$comment->content}}</li>
                </br>
                @endforeach
            </ul>
        </div>
        <br>
        </div>
    </div>
</div>

<button class="btn btn-primary" id="ajax-test">Press me</button>
<script>
    var count = 1;
    document.getElementById('ajax-test').onclick = function() {
       alert("button was clicked " + (count++) + " times");
    };
</script>
@endsection