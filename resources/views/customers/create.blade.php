@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-transparent my-3">
                    <div class="card-header">Customers</div>
                    <div class="card-body">
                    <form method="post" action="{{route('customers.store')}}">
                            @csrf
                            <label class="star">Name</label>
                            <input class="form-control bg-transparent" type="text" name="name" value="{{old('name')}}"></input>
                            <br>

                            <label class="star">Phone Number(Primary)</label>
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

                            <label>Email</label>
                            <input class="form-control bg-transparent" type="email" name="email" value="{{old('email')}}"></input>
                            <br>

                            <label>Email Secondary</label>
                            <input class="form-control bg-transparent" type="email" name="email_secondary" value="{{old('email_secondary')}}"></input>
                            <br>

                            <label>Company</label>
                            <input class="form-control bg-transparent" type="email" name="company" value="{{old('company')}}"></input>
                            <br>

                            <label>Website</label>
                            <input class="form-control bg-transparent" type="text" name="website" value="{{old('website')}}"></input>
                            <br>
                            
                            <label>City</label>
                            <input class="form-control bg-transparent" type="text" name="city" value="{{old('city')}}"></input>
                            <br>
                            
                            <label>Country</label>
                            <input class="form-control bg-transparent" type="text" name="country" value="{{old('country')}}"></input>
                            <br>

                            <label>Address</label>
                            <input class="form-control bg-transparent" type="text" name="address" value="{{old('address')}}"></input>
                            <br>

                            <label>Postal Code</label>
                            <input class="form-control bg-transparent" type="text" name="postal_code" value="{{old('postal_code')}}"></input>
                            <br>

                            <label>Note</label>
                            <input class="form-control bg-transparent" type="text" name="note" value="{{old('note')}}"></input>
                            <br>

                            <button class="btn btn-info" type="submit">Create User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
