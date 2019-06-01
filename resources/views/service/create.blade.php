@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card bg-transparent my-3">
        <div class="card-header">Service</div>
        <div class="card-body">
          <form method="post" action="{{route('services.store')}}">
            @csrf

            <label>Subcategory</label>
            <select class="form-control bg-transparent" name="subcategory_id">
              @foreach($subcategories as $subcategory)
                @if(old('subcategory_id') == $subcategory->id)
                  <option selected value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                @else
                  <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                @endif
              @endforeach
            </select>
            <br>

            <label class="star">Title</label>
            <input class="form-control bg-transparent" type="text" name="title" value="{{old('title')}}"></input>
            <br>

            <label class="star">Description</label>
            <textarea class="form-control bg-transparent" id="exampleFormControlTextarea1" name="description" rows="3">{{old('description')}}</textarea>
            <br>

            <label class="star">Price</label>
            <input class="form-control bg-transparent" type="number" name="price" value="{{old('price')}}"></input>
            <br>

            <button class="btn btn-info" type="submit">Create Service</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection