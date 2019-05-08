@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                    <form method="post" action="{{route('categories.store')}}">
                            @csrf
                            <label>Name</label>
                            <input class="form-control" type="text" name="name" value="{{old('name')}}"></input>
                            <br>

                            <label>Description</label>
                            <input class="form-control" type="text" name="description" value="{{old('description')}}"></input>
                            <br>

                            <button class="btn btn-primary" type="submit">Create Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
