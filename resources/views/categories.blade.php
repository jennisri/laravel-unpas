@extends('layouts.app')

@section('container')
<h1>Categories Blogs</h1>

<div class="container">
	<div class="row">
		@foreach($categories as $data)	
		<div class="col-md-4 mt-3">
			<a href="{{ url('blog?category='.$data->slug) }}">
				<div class="card text-bg-dark">
					<img src="https://source.unsplash.com/500x400?{{ $data->name }}" class="card-img" alt="{{ $data->name }}">
					<div class="card-img-overlay d-flex align-items-center p-0">
						<h5 class="card-title text-center flex-fill p-3" style="background-color: rgba(0, 0, 0, 0.6);">{{ $data->name }}</h5>
					</div>
				</div>
			</a>
		</div>
		@endforeach
	</div>
</div>
@endsection