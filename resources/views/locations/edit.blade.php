@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-transparent my-3">
                    <div class="card-header">Edit Location</div>

                    <div class="card-body">
                        <form method="post" action="{{route('locations.update', ['location' => $location->id])}}">
                            @csrf
                            <input type="hidden" name="_method" value="put"></input>

                            <label>Name</label>
                            <input class="form-control bg-transparent" type="text" value="{{$location->name}}" name="name"></input>
                            <br>

                            <button class="btn btn-primary" type="submit">Save</button>
                        </form>

                        <form method="POST" action="{{route('locations.destroy', ['location'=>$location->id])}}">
                            @csrf
                            <input type="hidden" name="_method" value="delete"></input><br>
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
