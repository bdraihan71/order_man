@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card bg-transparent my-3">
        <div class="card-header">Service</div>
        <div class="card-body">

          <span>
            <h5>Title:</h5>
          </span>
          <P>{{$service->title}}</P>
          <br>

          <span>
            <h5>Description:</h5>
          </span>
          <P>{{$service->description}}</P>
          <br>

          <span>
            <h5>Subcategory:</h5>
          </span>
          <P>{{$service->subcategory->name}}</P>
          <br>

          <span>
            <h5>Price:</h5>
          </span>
          <P>{{$service->price}}</P>
          <br>

          <span>
            <h5>Minimum Price:</h5>
          </span>
          <P>{{$service->min_price}}</P>
          <br>

          <span>
            <h5>Maximum Price:</h5>
          </span>
          <P>{{$service->max_price}}</P>
          <br>

          <a href="{{route('services.index')}}" class="btn btn-info">Service List</a>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection