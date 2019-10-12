@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card bg-transparent my-3">
        <div class="card-header">Service</div>
        <div class="card-body">
          <form method="post" action="{{route('services.update', $service->id)}}">
            @csrf
            @method('patch')
            <label>Subcategory</label>
            <select class="form-control bg-transparent" name="subcategory_id">
              @foreach($subcategories as $subcategory)
                @if(old('subcategory_id') == $subcategory->id)
                  <option selected value="{{$service->subcategory->id}}">{{$service->subcategory->name}}</option>
                @else
                  <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                @endif
              @endforeach
            </select>
            <br>

            <label>Title</label>
              <input class="form-control bg-transparent" type="text" name="title" value="{{$service->title}}">
            <br>

            <label>Description</label>
              <textarea class="form-control bg-transparent" id="exampleFormControlTextarea1" name="description" rows="3">{{$service->description}}</textarea>
            <br>

            <label>Price</label>
              <input class="form-control bg-transparent" type="number" name="price" value="{{$service->price}}">
            <br>

            <label>Minimum Price</label>
              <input class="form-control bg-transparent" type="number" name="min_price" value="{{$service->min_price}}">
            <br>

            <label>Maximum Price</label>
              <input class="form-control bg-transparent" type="number" name="max_price" value="{{$service->max_price}}">
            <br>

            <button class="btn btn-info" type="submit">Update Service</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection