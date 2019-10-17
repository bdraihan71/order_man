@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card bg-transparent my-3">
                <div class="card-header lead">Services
                    <a href="{{route('services.create')}}" class="btn btn-outline-info float-right">Create Service</a>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <td>Title</td>
                            <td>Subcategory</td>
                            <td>Price</td>
                            <td>Minimum Price</td>
                            <td>Maximum Price</td>
                            <td>Actions</td>
                        </tr>
                        @foreach ($services as $service)
                        <tr>
                            <td>{{ $service->title }}</td>
                            <td>{{ $service->subcategory->name }}</td>
                            <td>{{ $service->price }}</td>
                            <td>{{ $service->min_price }}</td>
                            <td>{{ $service->max_price }}</td>
                            <td>
                                <a class="btn btn-primary my-2" href="{{route('services.show', ['service' => $service->id])}}">View</a>
                                <a class="btn btn-info my-2" href="{{route('services.edit', ['service' => $service->id])}}">Edit</a>
                                <form action="{{ route('services.destroy', $service->id)}}" onclick="return confirm('Are you sure?')" method="post" style="display: inline;">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger my-2" type="submit">delete</button>
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