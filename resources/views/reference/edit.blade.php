@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Users</div>
                    <div class="card-body">
                    <form method="post" action="{{route('reference.update', $reference->id)}}">
                            @csrf
                            @method('patch')
                            <label>Name</label>
                            <input class="form-control" type="text" name="name" value="{{$reference->name}}"></input>
                            <br>
                            <button class="btn btn-primary" type="submit">Update Reference</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
