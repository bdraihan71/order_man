@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="/customers">Customers</a>
                <div class="card">
                    <div class="card-header">Edit Customer</div>

                    <div class="card-body">
                        <form method="post" action="{{route('customers.update', ['customer' => $customer->id])}}">
                            @csrf
                            <input type="hidden" name="_method" value="put"></input>

                            <label>Name</label>
                            <input class="form-control" type="text" value="{{$customer->name}}" name="name"></input>
                            <br>

                            <label>Primary Phone Number</label>
                            <input disabled class="form-control" type="int" value="{{$customer->primary_contact_number}}" name="primary_contact_number"></input>
                            <br>

                            <label>Role</label>
                            <select class="form-control" name="location_id">
                                @foreach($locations as $location)
                                    @if($location->id == $customer->location->id)
                                        <option selected value="{{$location->id}}"></option>
                                    @else
                                        <option value="{{$location->id}}"></option>
                                    @endif
                                @endforeach
                            </select>
                            <br>

                            <button class="btn btn-primary" type="submit">Save</button>
                        </form>

                        <form method="POST" action="{{route('customers.destroy', ['customer'=>$customer->id])}}">
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
