@extends('layouts.app')

@section('container')

<div class="container">
	<div class="row justify-content-center mb-4">
		<div class="col-md-8">
			<h1>{{ $blog->title }}</h1>
			<hr>
			<article class=" mb-3">
				<p>By. <a href="{{ url('blog?author='.$blog->author->username) }}" class="text-decoration-none">{{ $blog->author->name }}</a> 
					|
					<a href="{{ url('blog?category='.$blog->category->slug) }}" class="text-decoration-none"> {{ $blog->category->name }}</a></p>


					@if($blog->image)
					<div style="max-height: 350px; overflow: hidden;">
						<img src="{{ asset('storage/'.$blog->image) }}" alt="{{ $blog->category->name }}" class="img-fluid">
					</div>
					@else
					<img src="https://source.unsplash.com/1200x400?{{ $blog->category->name }}" alt="{{ $blog->category->name }}" class="img-fluid">
					@endif

					{{-- tidak pakai htmlspesialchar --}}
					<article class="my-3 fs-6">
						{!! $blog->body !!}
					</article>
					<br>

					<a href="{{ url('blog') }}" class="btn btn-secondary">Back</a>
				</article>
			</div>
		</div>
	</div>


	@endsection