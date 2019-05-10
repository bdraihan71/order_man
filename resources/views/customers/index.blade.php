@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Customers
                        <a href="{{route('customers.create')}}" class="btn btn-primary">Create Customers</a>
                    </div>

                    <div class="card-body">
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
                                <td style="width:22%">
                                    <a class="btn btn-primary" href="{{route('customers.show', ['customer' => $customer->id])}}">View</a>
                                    <a class="btn btn-info" href="{{route('customers.edit', ['customer' => $customer->id])}}">Edit</a>
                                    <form action="{{ route('customers.destroy', $customer->id)}}" onclick="return confirm('Are you sure?')" method="post" style="display: inline;">
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
