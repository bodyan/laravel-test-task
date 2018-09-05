@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <span class="float-right">
                <a class="btn btn-secondary" href="{{ route('post.create') }}">
                    {{ __('Add Post') }}
                </a>
            </span>
        </div>
    </div>  
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-preview">
              <h2 class="post-title">
                {{ $post->title }}
              </h2>
              <p class="post-subtitle">
                {!! $post->body !!}
              </p>

            <p class="post-meta">Posted by
              <a href="#">Start Bootstrap</a>
              on July 8, 2018
                <a href="{{ route('post.edit', ['id' => $post->id]) }}">[Edit]</a>
                <a href="{{ route('post.delete', ['id' => $post->id]) }}">[Delete]</a>
            </p>
            </div>
          <hr>
        </div>
    </div>
</div>
@endsection