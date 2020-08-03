@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-transparent my-3">
                    <div class="card-header lead">Reference
                        <a href="{{route('reference.create')}}" class="btn btn-outline-info float-right">Create Reference</a>
                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td>Name</td>
                                <td>Actions</td>
                            </tr>
                        @foreach ($references as $reference)
                            <tr>
                                <td>{{ $reference->name }}</td>
                                <td>
                                <a class="my-1" href="{{route('reference.show', ['reference' => $reference->id])}}"><i class="fas fa-eye"></i></a>
                                <a class="my-1" href="{{route('reference.edit', $reference->id)}}"><i class="fas fa-edit"></i></a>
                                <form action="{{route('reference.destroy', $reference->id)}}" onclick="return confirm('Are you sure?')" method="post" style="display: inline;">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline my-1" type="submit"><i class="fas fa-trash"></i></button>
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
