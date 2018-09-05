@extends('layouts.app')

@section('content')
<div class="container">
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
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="category-preview">
            <a href="{{ route('category.show', ['id' => $category->id]) }}">
              <h2 class="category-title">
                {{ $category->title }}
              </h2>
            </a>  
              <p class="category-subtitle">
                {{ $category->body }}
              </p>

            <p class="category-meta">categoryed by
              <a href="#">Start Bootstrap</a>
              on July 8, 2018
                <a href="{{ route('category.edit', ['id' => $category->id]) }}">[Edit]</a>
                <a href="{{ route('category.delete', ['id' => $category->id]) }}">[Delete]</a>
            </p>
            </div>
          <hr>
        </div>
    </div>
</div>
@endsection