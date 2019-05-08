@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit User</div>

                    <div class="card-body">
                        <form method="post" action="{{route('users.update', ['user' => $user->id])}}">
                            @csrf
                            <input type="hidden" name="_method" value="put"></input>

                            <label>Name</label>
                            <input class="form-control" type="text" value="{{$user->name}}" name="name"></input>
                            <br>

                            <label>Email</label>
                            <input disabled class="form-control" type="text" value="{{$user->email}}" name="email"></input>
                            <br>

                            <label>Role</label>
                            <select class="form-control" name="role_id">
                                @foreach($roles as $role)
                                    @if($role->id == $user->role->id)
                                        <option selected value="{{$role->id}}">{{$role->display_name}}</option>
                                    @else
                                        <option value="{{$role->id}}">{{$role->display_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <br>

                            <button class="btn btn-primary" type="submit">Save</button>
                        </form>

                        <form method="POST" action="{{route('users.destroy', ['user'=>$user->id])}}">
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
