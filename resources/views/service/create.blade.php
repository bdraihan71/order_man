@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Service</div>
        <div class="card-body">
          <form method="post" action="{{route('services.store')}}">
            @csrf

            <label>Subcategory</label>
            <select class="form-control" name="subcategory_id">
              @foreach($subcategories as $subcategory)
              @if(old('subcategory_id') == $subcategory->id)
              <option selected value="{{$subcategory->id}}">{{$subcategory->name}}</option>
              @else
              <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
              @endif
              @endforeach
            </select>
            <br>

            <label>Title</label>
            <input class="form-control" type="text" name="title" value="{{old('name')}}"></input>
            <br>

            <label>Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3">{{old('description')}}</textarea>
            <br>

            <label>Price</label>
            <input class="form-control" type="number" name="price" value="{{old('email')}}"></input>
            <br>

            <button class="btn btn-primary" type="submit">Create Service</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection