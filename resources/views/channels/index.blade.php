@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-transparent my-3">
                    <div class="card-header lead">Channels
                        <a href="{{route('channels.create')}}" class="btn btn-outline-info float-right">Create Channel</a>
                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td>Name</td>
                                <td>Actions</td>
                            </tr>
                        @foreach ($channels as $channel)
                            <tr>
                                <td>{{ $channel->name }}</td>
                                <td>
                                    <a class="btn btn-primary my-1" href="{{route('channels.show', ['channel' => $channel->id])}}">View</a>
                                    <a class="btn btn-info my-1" href="{{route('channels.edit', ['channel' => $channel->id])}}">Edit</a>
                                    <form action="{{ route('channels.destroy', $channel->id)}}" onclick="return confirm('Are you sure?')" method="post" style="display: inline;">
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