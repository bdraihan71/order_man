@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Users
                        <a href="{{route('users.create')}}" class="btn btn-primary">Create User</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <td>Name</td>
                                <td>Role</td>
                                <td>Email</td>
                                <td>Actions</td>
                            </tr>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->role->display_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                <a class="btn btn-primary" href="{{route('users.show', ['user' => $user->id])}}">View</a>
                                <a class="btn btn-info" href="{{route('users.edit', ['user' => $user->id])}}">Edit</a>
                                <form action="{{ route('users.destroy', $user->id)}}" onclick="return confirm('Are you sure?')" method="post" style="display: inline;">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">delete</button>
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
