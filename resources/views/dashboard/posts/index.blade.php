@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Laporan</h1>
  </div>

  @if(session()->has('succes'))
    <div class="alert alert-success" role="alert">
      {{ session('succes') }}
    </div>
  @endif

  <div class="table-responsive col-lg-8">
    <a href="/dashboard/post/create" class="btn btn-primary mb-3">Create</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)    
        <tr> 
         <td>{{ $loop->iteration }}</td>
         <td>{{ $post->title }}</td>
         <td>
           <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
           <a href="/dashboard/posts/{{ $post->id }}" class="badge bg-warning"><span data-feather="edit-2"></span></a>
           <a href="/dashboard/posts/{{ $post->id }}" class="badge bg-danger"><span data-feather="trash-2"></span></a>
          </td> 
       </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection