@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Post</h1>
  </div>

  <div class="col-lg-8">
      <form method="POST" action="/dashboard/post">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
          <label for="body" class="form-label">Body</label>
          <input type="text" class="form-control" id="body" name="body">
        </div>
        <button type="submit" class="btn btn-primary">Post</button>
      </form>
  </div>
@endsection