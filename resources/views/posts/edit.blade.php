@extends('layouts.app')

@section('content')

<div class="container">
	    <div class="row justify-content-center">
			@guest
				<div class="alert alert-danger" role="alert">
				    You are not allowed to add post. Please login 
				    <a class="alert-link" href="{{ route('login') }}">
		                {{ __('here') }}
		            </a> first.
				</div>
			@else

	        <div class="col-md-8">
			<form method="POST" action="{{ route('post.update') }}" aria-label="{{ __('Edit Post') }}">
				@csrf
			  <div class="form-group">
			    <input class="form-control form-control-lg" type="text" name="title" value="{{ $post->title }}" required>
			  </div>
			  <div class="form-group">
				<select class="form-control form-control-lg" name="category">
				  <option>{{ __('Select category') }}</option>
				  @foreach ($categories as $category)
				  	<option value="{{ $category->id }}" {{ $post->category_id === $category->id ? "selected" : "" }}>{{ $category->title }}</option>
				  @endforeach
				</select>
				</div>		
			  <div class="form-group">
			    <textarea class="form-control" id="editor" name="message" rows="4">{{ $post->body }}</textarea>
			    <input type="hidden" name="id" value="{{$post->id}} ">
			  </div>
	        <div class="form-group row mb-0">
	            <div class="col-md-8">
	                <button type="submit" class="btn btn-primary">
	                    {{ __('Edit Post') }}
	                </button>

	                <a class="btn btn-secondary" href="{{ route('home') }}">
	                    {{ __('Cancel') }}
	                </a>
	            </div>
	        </div>
	       	<br>
			</form>
	        </div>
			@endguest
	    </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
