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
              @guest
              @else
                <a href="{{ route('post.edit', ['id' => $post->id]) }}">[Edit]</a>
                <a href="{{ route('post.delete', ['id' => $post->id]) }}" onclick="return confirm('Really delete this Post?')">[Delete]</a>
              @endguest 
            </p>
              <p class="post-subtitle">
                {!! $post->body !!}
              </p>
            </div>

        <div class="well">
        @include('layouts.errors')
        @guest
        @else
        <h4>What is on your mind?</h4>
            <div class="form-group">
                <input type="textarea" class="form-control" id="userComment" placeholder="Write your message here..." name="comment" required>
            </div>
            <button id="commentCubmit" class="btn btn-primary">
                {{ __('Add Comment') }}
            </button>
        @endguest 
        <hr>
        <h6>Comments:</h6>
        <ul id="sortable" class="list-unstyled ui-sortable">
            @foreach($comments as $comment)
            <strong class="pull-left primary-font">{{$comment->name}}</strong>
            <small class="pull-right text-muted">
               <span class="glyphicon glyphicon-time"></span> {{ $comment->created_at }}
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

<script src="{{ asset('js/jquery-3.3.1.min.js') }}" ></script>

<script>
$(document).ready(function(){
    $('#commentCubmit').click(function() {
        var comment = document.getElementById('userComment').value;
        $.ajax({
            url: "{{ route('comments.ajaxstore') }}", 
            type: "POST",
            data: { 
                "_token": "{{ csrf_token() }}",
                "id": "{{ $post->id }}",
                "comment": comment
            },
            success: function(output){
                if (output.name.length !== undefined) {
                    var html = '';
                    html += '<strong class="pull-left primary-font">'+output.name+'</strong>';
                    html += '<small class="pull-right text-muted"><span class="glyphicon glyphicon-time"></span> ';
                    html += output.date+'</small></br>';
                    html += '<li class="ui-state-default">'+output.comment+'</li></br>';
                    $("#sortable").prepend(html);
                }
                $("#userComment").val('');
            }
        });
    });
});
</script>
@endsection