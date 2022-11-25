@extends('dashboard/layouts/main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">Create New Post</h1>
	</div>

	<div class="col-lg-8">
		<form action="{{ url('dashboard/blogs') }}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="mb-3">
				<label for="title" class="form-label">Title</label>
				<input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">

				@error('title')
				<div class="invalid-feedback">{{ $message }}</div>
				@enderror
			</div>

			<div class="mb-3">
				<label for="slug" class="form-label">Slug</label>
				<input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}">

				@error('slug')
				<div class="invalid-feedback">{{ $message }}</div>
				@enderror
			</div>

			<div class="mb-3">
				<label for="category" class="form-label">Category</label>
				<select class="form-select" name="category_id" id="category">
					<option hidden>choose</option>
					@foreach($categories as $category)
					@if(old('category_id') == $category->id)
					<option value="{{ $category->id }}" selected>{{ $category->name }}</option>
					@else
					<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endif

					@endforeach
				</select>
			</div>

			<div class="mb-3">
				<label for="image" class="form-label">Blog Image</label>
				<img class="img-preview img-fluid mb-3 col-sm-5">
				<input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
				@error('image')
				<div class="invalid-feedback">{{ $message }}</div>
				@enderror
			</div>

			<div class="mb-3">
				<label for="body" class="form-label">Body</label>
				<textarea name="body" id="body" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror" >{{ old('body') }}</textarea>

				@error('body')
				<div class="invalid-feedback">{{ $message }}</div>
				@enderror
			</div>


			
			<button type="submit" class="btn btn-primary">Create</button>
		</form>
	</div>
</main>

{{-- menggunakan slugablle --}}
{{-- 
<script>
	const title = document.querySelector('#title');
	const slug = document.querySelector('#slug');

	title.addEventListener('change', function() {
		// bikin satu method baru untuk menangani check slug
		fetch('/dashboard/blogs/checkSlug?title=' + title.value)
		.then(response => response.json())
		.then(data => slug.value = data.slug)
	});
</script> --}}


@section('script')
{{-- kode js saja, bisa pake keyup bisa pake change --}}
<script>
	const title = document.querySelector('#title');
	const slug = document.querySelector('#slug');

	title.addEventListener("change", function() {
		let preslug = title.value;
		preslug = preslug.replace(/ /g,"-");
		slug.value = preslug.toLowerCase();
	});

	function previewImage(){

		const image = document.querySelector('#image');
		const imgPreview = document.querySelector('.img-preview');

		imgPreview.style.display = 'block';

		const oFReader = new FileReader();
		oFReader.readAsDataURL(image.files[0]);

		oFReader.onload = function(oFREvent){
			imgPreview.src = oFREvent.target.result;
		}
	}
</script>

<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>

<script>
	CKEDITOR.replace( 'body' );
</script>
@endsection

@endsection