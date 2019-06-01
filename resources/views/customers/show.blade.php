@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 my-5">
      <div class="card bg-transparent">
        <div class="card-header">Customer</div>
        <div class="card-body">
        
          <span>
            <h5>ID:</h5>
          </span>
          <P>{{$customer->id}}</P>
          <br>

          <span>
            <h5>Name:</h5>
          </span>
          <P>{{$customer->name}}</P>
          <br>

          <span>
            <h5>Contact Number(Primary):</h5>
          </span>
          <P>{{$customer->primary_contact_number}}</P>
          <br>

          <span>
            <h5>Contact Number(Secondary):</h5>
          </span>
          <P>{{$customer->secondary_contact_number}}</P>
          <br>

          <span>
            <h5>Profession:</h5>
          </span>
          <P>{{$customer->profession}}</P>
          <br>

          <span>
            <h5>Location:</h5>
          </span>
          <P>{{$customer->location->name}}</P>
          <br>

          <a href="{{route('customers.index')}}" class="btn btn-info">Customer List</a>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection