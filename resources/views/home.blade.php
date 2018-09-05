@extends('layouts.master')

@section('title', '- Home Page')

@section('content')

<div class="row">

    <div class="col-sm-8 blog-main">

        @foreach($posts as $post)
            <div class="blog-post">
            <a href="{{ route('post.show', ['id' => $post->id]) }}"><h2 class="blog-post-title">{{ $post->title }} </h2></a>
            <p class="blog-post-meta">{{ date('d F', strtotime($post->created_at)) }} <a href="#">{{ $post->user->name }}</a> in 
                <a href="{{ route('category.show', ['id' => $post->category->id])}} ">{{ $post->category->title }}</a></p>
            {!! $post->body !!}
            </div><!-- /.blog-post -->
         @endforeach

        <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
        </nav>

    </div><!-- /.blog-main -->

    <!-- /.blog-sidebar -->
    @include('layouts.partials._sidebar')

</div><!-- /.row -->

@endsection      
