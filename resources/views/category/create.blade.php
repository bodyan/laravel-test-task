@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
		@guest
			<div class="alert alert-danger" role="alert">
			    You are not allowed to add category. Please login 
			    <a class="alert-link" href="{{ route('login') }}">
	                {{ __('here') }}
	            </a> first.
			</div>
		@else

        <div class="col-md-8">
		<form method="POST" action="{{ route('category.create') }}" aria-label="{{ __('Add Category') }}">
			@csrf
		  <div class="form-group">
		    <input class="form-control form-control-lg" type="text" placeholder="Category Name" name="title" required>
		  </div>
<!-- 		  <div class="form-group">
	<label for="textarea-body">Description:</label>
  <textarea class="form-control" id="textarea-body" name="message" rows="4"></textarea>
</div> -->
        <div class="form-group row mb-0">
            <div class="col-md-8">
                <button type="submit" class="btn btn-primary">
                    {{ __('Add Category') }}
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
