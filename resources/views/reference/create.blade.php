@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-transparent my-3">
                    <div class="card-header">Users</div>
                    <div class="card-body">
                    <form method="post" action="{{route('reference.store')}}">
                            @csrf
                            <label class="star">Name</label>
                            <input class="form-control bg-transparent" type="text" name="name" value="{{old('name')}}"></input>
                            <br>
                            <button class="btn btn-info" type="submit">Create Reference</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection