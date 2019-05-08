@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">User</div>
        <div class="card-body">

          <span>
            <h5>ID:</h5>
          </span>
          <P>{{$user->id}}</P>
          <br>

          <span>
            <h5>Name:</h5>
          </span>
          <P>{{$user->name}}</P>
          <br>

          <span>
            <h5>Email:</h5>
          </span>
          <P>{{$user->email}}</P>
          <br>

          <span>
            <h5>Email Verified At:</h5>
          </span>
          <P>{{$user->email_verified_at}}</P>
          <br>

          <span>
            <h5>Role:</h5>
          </span>
          <P>{{$user->role->name}}</P>
          <br>

          <a href="{{route('users.index')}}" class="btn btn-info">User List</a>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection