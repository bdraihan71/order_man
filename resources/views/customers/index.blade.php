@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-transparent my-3">
                    <div class="card-header lead">Customers
                        <a href="{{route('customers.create')}}" class="btn btn-outline-info float-right">Create Customers</a>
                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td>Name</td>
                                <td>Contact Number(Primary)</td>
                                <td>Contact Number(Secondary)</td>
                                <td>Profession</td>
                                <td>Location</td>
                                <td>Actions</td>
                            </tr>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->primary_contact_number }}</td>
                                <td>{{ $customer->secondary_contact_number }}</td>
                                <td>{{ $customer->profession }}</td>
                                <td>{{ $customer->location->name }}</td>
                                <td>
                                    <a class="my-1" href="{{route('customers.show', ['customer' => $customer->id])}}"><i class="fas fa-eye"></i></a>
                                    <a class="my-1" href="{{route('customers.edit', ['customer' => $customer->id])}}"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('customers.destroy', $customer->id)}}" onclick="return confirm('Are you sure?')" method="post" style="display: inline;">
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
