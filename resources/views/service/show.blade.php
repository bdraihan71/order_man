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
          <p>{{$service->title}}</p>
          <br>

          <span>
            <h5>Description:</h5>
          </span>
          <p>{{$service->description}}</p>
          <br>

          <span>
            <h5>Subcategory:</h5>
          </span>
          <p>{{$service->subcategory->name}}</p>
          <br>

          <span>
              <h5>Unit:</h5>
          </span>
          @if($service->unit)
            <p>{{$service->unit}}</p>
          @else
            <p class="red">No unit found</p>
          @endif
          <br>

          <span>
            <h5>Stock Available:</h5>
          </span>
          <p>{{$service->stock_available}}</p>
          <br>
          
          <span>
            <h5>Price:</h5>
          </span>
          <p>{{$service->price}}</p>
          <br>

          <span>
            <h5>Minimum Price:</h5>
          </span>
          <p>{{$service->min_price}}</p>
          <br>

          <span>
            <h5>Maximum Price:</h5>
          </span>
          <p>{{$service->max_price}}</p>
          <br>

          <a href="{{route('services.index')}}" class="btn btn-info">Service List</a>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection