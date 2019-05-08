@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Location</div>
                    <div class="card-body">
                    <form method="post" action="{{route('locations.store')}}">
                            @csrf
                            <label>Name</label>
                            <input class="form-control" type="text" name="name" value="{{old('name')}}"></input>
                            <br>

                            <button class="btn btn-primary" type="submit">Create Location</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
