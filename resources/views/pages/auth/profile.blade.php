@extends('layouts.public')
@section('content')
  <div class="row d-flex justify-content-center mt-5">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header">
          <h4>Edit Profile</h4>
        </div>
        <div class="card-body">
          <form action="">
            <div class="form-group">
              <label for="username">Username</label>
              <input id="username" name="username" type="text" class="form-control">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input id="email" name="email" type="text" class="form-control">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input id="password" name="password" type="text" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary mb-4">
              SAVE
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
