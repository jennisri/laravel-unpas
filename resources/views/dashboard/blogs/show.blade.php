@extends('dashboard.layouts.main')

@section('container')
<div class="container">
  <div class="row justify-content-center my-4">
    <div class="col-lg-8">
      <h1>{{ $blog->title }}</h1>
      <hr>
      <article class=" mt-3">
        <a href="{{ url('dashboard/blogs') }}" class="btn btn-success mb-3 btn-sm"><span data-feather="arrow-left"></span> Back to blogs</a>


        <a href="{{ url('dashboard/blogs/'.$blog->slug.'/edit') }}" class="btn btn-warning mb-3 btn-sm"><span data-feather="edit"></span> Edit</a>

        <form action="{{ url('dashboard/blogs/'.$blog->slug) }}" method="post" class="d-inline">
          @csrf
          @method('delete')

          <button type="submit" class="btn btn-danger mb-3 btn-sm" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span>Delete</button>

        </form>

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
      </article>
    </div>
  </div>
</div>
@endsection