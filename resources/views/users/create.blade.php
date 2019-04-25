@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Users</div>
                    <div class="card-body">
                    <form method="post" action="{{route('users.store')}}">
                            @csrf
                            <label>Name</label>
                            <input class="form-control" type="text" name="name" value="{{old('name')}}"></input>
                            <br>

                            <label>Email</label>
                            <input class="form-control" type="text" name="email" value="{{old('email')}}"></input>
                            <br>

                            <label>Role</label>
                            <select class="form-control" name="role_id">
                                @foreach($roles as $role)
                                    @if(old('role_id') == $role->id)
                                        <option selected value="{{$role->id}}">{{$role->display_name}}</option>
                                    @else
                                        <option value="{{$role->id}}">{{$role->display_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <br>

                            <button class="btn btn-primary" type="submit">Create User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
