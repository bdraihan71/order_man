@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Services
                    <a href="{{route('services.create')}}" class="btn btn-primary">Create Service</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <td>Title</td>
                            <td>Description</td>
                            <td>Price</td>
                            <td>Actions</td>
                        </tr>
                        @foreach ($services as $service)
                        <tr>
                            <td>{{ $service->title }}</td>
                            <td>{{ $service->description }}</td>
                            <td>{{ $service->price/100 }}</td>
                            <td style="width:20%">
                                <a class="btn btn-info" href="{{route('services.edit', ['service' => $service->id])}}">Edit</a>
                                <form action="{{ route('services.destroy', $service->id)}}" onclick="return confirm('Are you sure?')" method="post" style="display: inline;">
                                    @csrf
                                    @method('delete')
                                    <button  class="btn btn-danger" type="submit">delete</button>
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