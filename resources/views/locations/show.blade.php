@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">Location</div>
        <div class="card-body">

          <span>
            <h5>Name:</h5>
          </span>
          <P>{{$location->name}}</P>
          <br>

          <span>
            <h5>ID:</h5>
          </span>
          <P>{{$location->id}}</P>
          <br>

          <a href="{{route('locations.index')}}" class="btn btn-info">Location List</a>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection