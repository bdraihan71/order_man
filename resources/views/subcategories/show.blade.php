@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">Subcategory</div>
        <div class="card-body">

          <span>
            <h5>Name:</h5>
          </span>
          <P>{{$subcategory->name}}</P>
          <br>

          <span>
            <h5>Description:</h5>
          </span>
          <P>{{$subcategory->description}}</P>
          <br>

          <span>
            <h5>Subcategory:</h5>
          </span>
          <P>{{$subcategory->category->name}}</P>
          <br>

          <a href="{{route('subcategories.index')}}" class="btn btn-info">Subcategory List</a>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection