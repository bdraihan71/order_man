@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card bg-transparent my-3">
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

          <span>
            <h5>Email:</h5>
          </span>
          <P>{{$customer->email}}</P>
          <br>

          <span>
            <h5>Email (Secondary):</h5>
          </span>
          <P>{{$customer->email_secondary}}</P>
          <br>

          <span>
            <h5>Website:</h5>
          </span>
          <P>{{$customer->website}}</P>
          <br>

          <span>
            <h5>City:</h5>
          </span>
          <P>{{$customer->city}}</P>
          <br>

          <span>
            <h5>Country:</h5>
          </span>
          <P>{{$customer->country}}</P>
          <br>

          <span>
            <h5>Address:</h5>
          </span>
          <P>{{$customer->address}}</P>
          <br>

          <span>
            <h5>Postal Code:</h5>
          </span>
          <P>{{$customer->postal_code}}</P>
          <br>

          <span>
            <h5>Note:</h5>
          </span>
          <P>{{$customer->note}}</P>
          <br>
          
          <a href="{{route('customers.index')}}" class="btn btn-info">Customer List</a>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection