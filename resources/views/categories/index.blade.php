@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-transparent my-3">
                    <div class="card-header lead">Categories
                        <a href="{{route('categories.create')}}" class="btn btn-outline-info float-right">Create Category</a>
                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td>Name</td>
                                <td>Description</td>
                                <td>Actions</td>
                            </tr>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>
                                <a class="my-1" href="{{route('categories.show', ['category' => $category->id])}}"><i class="fas fa-eye"></i></a>
                                <a class="my-1" href="{{route('categories.edit', ['category' => $category->id])}}"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('categories.destroy', $category->id)}}" onclick="return confirm('Are you sure?')" method="post" style="display: inline;">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline my-1" type="submit"><i class="fas fa-trash"></i></button>
                                </form>
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