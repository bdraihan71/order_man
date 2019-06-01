@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-transparent my-3">
                    <div class="card-header lead">Locations
                        <a href="{{route('locations.create')}}" class="btn btn-outline-info float-right">Create Location</a>
                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td>Name</td>
                                <td>Actions</td>
                            </tr>
                        @foreach ($locations as $location)
                            <tr>
                                <td>{{ $location->name }}</td>
                                <td>
                                    <a class="btn btn-primary my-1" href="{{route('locations.show', ['location' => $location->id])}}">View</a>
                                    <a class="btn btn-info my-1" href="{{route('locations.edit', ['location' => $location->id])}}">Edit</a>
                                    <form action="{{ route('locations.destroy', $location->id)}}" onclick="return confirm('Are you sure?')" method="post" style="display: inline;">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger my-1" type="submit">delete</button>
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