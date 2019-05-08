@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Subcategories</div>
                    <div class="card-body">
                    <form method="post" action="{{route('subcategories.store')}}">
                            @csrf
                            <label>Name</label>
                            <input class="form-control" type="text" name="name" value="{{old('name')}}"></input>
                            <br>

                            <label>Category</label>
                            <select class="form-control" name="category_id">
                                @foreach($categories as $category)
                                    @if(old('category_id') == $category->id)
                                        <option selected value="{{$category->id}}">{{$category->name}}</option>
                                    @else
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endif
                                @endforeach
                            </select>

                            <label>Description</label>
                            <input class="form-control" type="text" name="description" value="{{old('description')}}"></input>
                            <br>

                            <button class="btn btn-primary" type="submit">Create Subcategory</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
