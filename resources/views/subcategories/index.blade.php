@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Subcategory
                        <a href="{{route('subcategories.create')}}" class="btn btn-primary">Create Subcategory</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <td>Name</td>
                                <td>Category</td>
                                <td>Description</td>
                                <td>Actions</td>
                            </tr>
                        @foreach ($subcategories as $subcategory)
                            <tr>
                                <td>{{ $subcategory->name }}</td>
                                <td>{{ $subcategory->category->name }}</td>
                                <td>{{ $subcategory->description }}</td>
                                <td>
                                    <a class="button" href="{{route('subcategories.edit', ['subcategory' => $subcategory->id])}}">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection