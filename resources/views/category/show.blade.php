@extends('layouts.app')

@section('title', ' - '.$category->title)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <span class="float-right">
                <a class="btn btn-secondary" href="{{ route('category.create') }}">
                    {{ __('Add category') }}
                </a>
            </span>
        </div>
    </div>  
    <div class="row">
        <div class="col-lg-10 col-md-10 mx-auto">
            <div class="category-preview">
                <div class="clearfix">
                  <h2 class="category-title float-left">
                    {{ $category->title }}
                  </h2>
                  <span class="float-right">
                    <a href="{{ route('category.edit', ['id' => $category->id]) }}">[Edit]</a>
                     <a href="{{ route('category.delete', ['id' => $category->id]) }}" onclick="return confirm('Really delete this Category?')">[Delete]</a>  
                  </span>
                </div>
              <p class="small post-meta">
                {!! $category->description !!}
              </p>
            @foreach($category->posts as $post)  
            <a href=" {{route('post.show', ['id' => $post->id] )}}"><h5> {{ $post->title }} </h5></a>
            @endforeach

            <p class="category-meta">Created by
              <a href="#">Start Bootstrap</a>
              on July 8, 2018
                <a href="{{ route('category.edit', ['id' => $category->id]) }}">[Edit]</a>
                <a href="{{ route('category.delete', ['id' => $category->id]) }}" onclick="return confirm('Really delete this Category?')">[Delete]</a>
            </p>
            </div>
          <hr>
        </div>
    </div>
@endsection