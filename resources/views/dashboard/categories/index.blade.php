@extends('dashboard.layouts.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Categories</h1>
  </div>


  @if(session('success'))
  <div class="alert alert-success col-md-9" role="alert">
    {{ session('success') }}
  </div>
  @endif

  <div class="table-responsive col-lg-10">

    <a href="{{ url('dashboard/categories/create') }}" class="btn btn-primary btn-sm mb-3">Create</a>

    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Category Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>

        @foreach($categories as $data)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $data->name }}</td>
          <td>
            <a href="{{ url('dashboard/categories/'.$data->slug) }}" class="badge bg-info"><span data-feather="eye"></span></a>

            <a href="{{ url('dashboard/categories/'.$data->slug.'/edit') }}" class="badge bg-warning"><span data-feather="edit"></span></a>

            <form action="{{ url('dashboard/categories/'.$data->slug) }}" method="post" class="d-inline">
              @csrf
              @method('delete')

              <button type="submit" class="badge bg-danger border-0 " onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>

            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</main>
@endsection