@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">Category</div>
        <div class="card-body">

          <span>
            <h5>ID:</h5>
          </span>
          <P>{{$category->id}}</P>
          <br>
         
          <span>
            <h5>Name:</h5>
          </span>
          <P>{{$category->name}}</P>
          <br>

          <span>
            <h5>Description:</h5>
          </span>
          <P>{{$category->description}}</P>
          <br>

          <a href="{{route('categories.index')}}" class="btn btn-info">Category List</a>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection