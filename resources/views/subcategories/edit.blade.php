@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-transparent my-3">
                    <div class="card-header">Edit Subcategory</div>

                    <div class="card-body">
                        <form method="post" action="{{route('subcategories.update', ['subcategory' => $subcategory->id])}}">
                            @csrf
                            <input type="hidden" name="_method" value="put"></input>

                            <label>Name</label>
                            <input class="form-control bg-transparent" type="text" value="{{$subcategory->name}}" name="name"></input>
                            <br>

                            <label>Category</label>
                            <select class="form-control bg-transparent" name="category_id">
                                @foreach($categories as $category)
                                    @if($category->id == $subcategory->category->id)
                                        <option selected value="{{$category->id}}">{{ $category->name }}</option>
                                    @else
                                        <option value="{{$category->id}}">{{ $category->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <br>

                            <label>Description</label>
                            <input class="form-control bg-transparent" type="text" value="{{$subcategory->description}}" name="description"></input>
                            <br>

                            <button class="btn btn-primary" type="submit">Save</button>
                        </form>

                        <form method="POST" action="{{route('subcategories.destroy', ['subcategory'=>$subcategory->id])}}">
                            @csrf
                            <input type="hidden" name="_method" value="delete"></input><br>
                            <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
