@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
  <div class="col-md-5">
    <main class="form-Registrasion w-100 m-auto">
      <h1 class="h3 mb-3 fw-normal text-center">Registrasion</h1>
      <form action="/register" method="POST">
        @csrf
        <div class="form-floating">
            <input type="text" name="name" class="form-control " id="name" placeholder="Name">
            <label for="name">Name</label>
          </div>
        <div class="form-floating">
          <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
          <label for="email">Email address</label>
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control raounded-bottom" id="password" placeholder="Password">
          <label for="password">Password</label>
        </div>

        <button class="btn btn-primary w-100 py-2 mt-2" type="submit">Register</button>
      </form>
      <small>Allready Register?<a href="/login">Login</small>
    </main>
  </div>
</div>


@endsection