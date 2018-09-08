@extends('layouts.app')

@section('title', '- Create Post')

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
		<form method="POST" action="{{ route('post.create') }}" aria-label="{{ __('Add Post') }}">
			@csrf
			@include('layouts.errors')
		  <div class="form-group">
		    <input class="form-control form-control-lg" type="text" placeholder="Title goes here..." name="title" required>
		  </div>
			<div class="form-group">
				<select class="form-control form-control-lg" name="category">
				  <option>{{ __('Select category') }}</option>
				  @foreach ($categories as $category)
				  	<option value="{{ $category->id }}" >{{ $category->title }}</option>
				  @endforeach
				</select>
			</div>			  
		  <div class="form-group">
		    <textarea class="form-control" id="editor" name="message" rows="6"></textarea>
		  </div>
        <div class="form-group row mb-0">
            <div class="col-md-8">
                <button type="submit" class="btn btn-primary">
                    {{ __('Add Post') }}
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
<style>
	.ck-editor__editable {
      min-height: 200px;
    }
</style>
@endsection
