@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-transparent my-3">
                    <div class="card-header lead">Subcategory
                        <a href="{{route('subcategories.create')}}" class="btn btn-outline-info float-right">Create Subcategory</a>
                    </div>

                    <div class="card-body table-responsive">
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
                                <a class="my-1" href="{{route('subcategories.show', ['subcategory' => $subcategory->id])}}"><i class="fas fa-eye"></i></a>
                                <a class="my-1" href="{{route('subcategories.edit', ['subcategory' => $subcategory->id])}}"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('subcategories.destroy', $subcategory->id)}}" onclick="return confirm('Are you sure?')" method="post" style="display: inline;">
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