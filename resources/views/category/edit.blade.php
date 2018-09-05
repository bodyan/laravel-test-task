@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
		@guest
			<div class="alert alert-danger" role="alert">
			    You are not allowed to edit category. Please login 
			    <a class="alert-link" href="{{ route('login') }}">
	                {{ __('here') }}
	            </a> first.
			</div>
		@else

        <div class="col-md-8">
		<form method="category" action="{{ route('category.update') }}" aria-label="{{ __('Edit Category') }}">
			@csrf
			<input type="hidden" name="id" value="{{ $category->id }}">	
		  <div class="form-group">
		    <input class="form-control form-control-lg" type="text" name="title" value="{{ $category->title }}" required>
		  </div>
<!-- 		  <div class="form-group">
  <textarea class="form-control" id="textare-body" name="message" rows="4">{{ $category->body }}</textarea>
</div> -->
        <div class="form-group row mb-0">
            <div class="col-md-8">
                <button type="submit" class="btn btn-primary">
                    {{ __('Edit Category') }}
                </button>

                <a class="btn btn-secondary" href="{{ route('home') }}">
                    {{ __('Cancel') }}
                </a>
            </div>
        </div>
		</form>
        </div>
		@endguest
    </div>
</div>
@endsection
