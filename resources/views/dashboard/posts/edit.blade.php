@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Post</h1>
  </div>

  <div class="col-lg-8">
      <form method="POST" action="/dashboard/post/{{ $post->id }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
        </div>
        <div class="mb-3">
          <label for="body" class="form-label">Body</label>
          <input type="text" class="form-control" id="body" name="body" value="{{ $post->body}}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
@endsection