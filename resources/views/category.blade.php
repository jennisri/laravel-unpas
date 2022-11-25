@extends('layouts.app')

@section('container')
<h1>Halaman Category : {{ $category }}</h1>
<hr>
@foreach($blogs as $data)
<article class=" mb-3">
	<h5><a href="{{ url('blog/'.$data->slug) }}">{{ $data->title }}</a></h5>
	<p>{{ $data->excerpt }}</p>

</article>
@endforeach
@endsection