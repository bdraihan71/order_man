@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card bg-transparent my-3">
        <div class="card-header">Channel</div>
        <div class="card-body">

          <span>
            <h5>Name:</h5>
          </span>
          <P>{{$channel->name}}</P>
          <br>

          <span>
            <h5>ID:</h5>
          </span>
          <P>{{$channel->id}}</P>
          <br>

          <a href="{{route('channels.index')}}" class="btn btn-info">Channel List</a>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection