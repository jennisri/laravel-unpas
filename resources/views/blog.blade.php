@extends('layouts.app')

@section('container')
<h1 class="text-center mb-3">{{ $title }}</h1>

<div class="container">
	<div class="row justify-content-center mb-3">
		<div class="col-md-6">
			<form action="{{ url('blog') }}">
				{{-- jika ada request category --}}
				@if(request('category'))
				{{-- input yang berisi apapun yang ada direquest category, agar disearch nya ada dua --}}
				<input type="hidden" name="category" value="{{ request('category') }}">
				@endif

				{{-- jika ada request author --}}
				@if(request('author'))
				{{-- input yang berisi apapun yang ada direquest author, agar disearch nya ada dua --}}
				<input type="hidden" name="author" value="{{ request('author') }}">
				@endif

				<div class="input-group mb-3">
					<input type="text" class="form-control" placeholder="Search .." name="search" value="{{ request('search') }}">
					<button class="btn btn-danger" type="submit" >Search</button>
				</div>
			</form>
		</div>
	</div>
</div>

@if($blogs->count())
<div class="card my-4">

	@if($blogs[0]->image)
	<div style="max-height: 350px; overflow: hidden;">
		<img src="{{ asset('storage/'.$blogs[0]->image) }}" alt="{{ $blogs[0]->category->name }}" class="img-fluid">
	</div>
	@else
	<img src="https://source.unsplash.com/1200x400?{{ $blogs[0]->category->name }}" class="card-img-top" alt="{{ $blogs[0]->category->name }}">
	@endif
	<div class="card-body text-center">

		<h5 class="card-title"><a href="{{ url('blog/'.$blogs[0]->slug) }}" class="text-decoration-none text-dark">{{ $blogs[0]->title }}</a></h5>
		<p>By. 
			<small class="text-muted">
				<a href="{{ url('blog?author='.$blogs[0]->author->username) }}" class="text-decoration-none">{{ $blogs[0]->author->name }}</a> 
				| 
				<a href="{{ url('blog?category='.$blogs[0]->category->slug) }}" class="text-decoration-none"> {{ $blogs[0]->category->name }}</a> {{ $blogs[0]->created_at->diffForHumans() }}
			</small>
		</p>

		<p class="card-text">{{ $blogs[0]->excerpt }}</p>

		<a href="{{ url('blog/'.$blogs[0]->slug) }}" class="btn btn-primary text-decoration-none">Read More</a>
	</div>
</div>



<div class="container">
	<div class="row">

		@foreach($blogs->skip(1) as $data)
		<div class="col-md-4 mb-3">
			<div class="card">
				<div class="position-absolute text-white px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7);"><a class="text-decoration-none text-white" href="{{ url('blog?category='.$data->category->slug) }}">{{ $data->category->name }}</a></div>


				@if($data->image)
				<img src="{{ asset('storage/'.$data->image) }}" alt="{{ $data->category->name }}" class="img-fluid">
				@else
				<img src="https://source.unsplash.com/500x400?{{ $data->category->name }}" class="card-img-top" alt="{{ $data->category->name }}">
				@endif

				<div class="card-body">
					<h5 class="card-title">{{ $data->title }}</h5>

					<p>By. 
						<small class="text-muted">
							<a href="{{ url('blog?author='.$data->author->username) }}" class="text-decoration-none">{{ $data->author->name }}</a> {{ $data->created_at->diffForHumans() }}
						</small>
					</p>

					<p class="card-text">{{ $data->excerpt }}</p>
					<a href="{{ url('blog/'.$data->slug) }}" class="btn btn-primary">Read More</a>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
@else

<p class="text-center fs-4">No Blog Found</p>

@endif

<div class="d-flex justify-content-center">
	
	{{ $blogs->links() }}
</div>

@endsection

