@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-transparent">
                    <div class="card-header">Customers</div>
                    <div class="card-body">
                    <form method="post" action="{{route('customers.store')}}">
                            @csrf
                            <label>Name</label>
                            <input class="form-control bg-transparent" type="text" name="name" value="{{old('name')}}"></input>
                            <br>

                            <label>Phone Number(Primary)</label>
                            <input class="form-control bg-transparent" type="text" name="primary_contact_number" value="{{old('primary_contact_number')}}"></input>
                            <br>

                            <label>Phone Number(Secondary)</label>
                            <input class="form-control bg-transparent" type="text" name="secondary_contact_number" value="{{old('secondary_contact_number')}}"></input>
                            <br>

                            <label>Profession</label>
                            <input class="form-control bg-transparent" type="text" name="profession" value="{{old('profession')}}"></input>
                            <br>

                            <label>Location</label>
                            <select class="form-control bg-transparent" name="location_id">
                                @foreach($locations as $location)
                                    @if(old('location_id') == $location->id)
                                        <option selected value="{{$location->id}}">{{$location->name}}</option>
                                    @else
                                        <option value="{{$location->id}}">{{$location->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <br>

                            <button class="btn btn-info" type="submit">Create User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
