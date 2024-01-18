@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
  <div class="col-md-4">
    <main class="form-signin w-100 m-auto">
      <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
      <form action="/login" method="post">
        @csrf
        <div class="form-floating">
          <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" autofocus required>
          <label for="email">Email address</label>
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
          <label for="password">Password</label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
      </form>
      <small>Not registered<a href="/register">Register Now!!!</small>
    </main>
  </div>
</div>


@endsection