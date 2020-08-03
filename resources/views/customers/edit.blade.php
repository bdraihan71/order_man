@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="my-2" href="/customers">Customers</a>
                <div class="card bg-transparent my-3">
                    <div class="card-header">Edit Customer</div>

                    <div class="card-body">
                        <form method="post" action="{{route('customers.update', ['customer' => $customer->id])}}">
                            @csrf
                            <input type="hidden" name="_method" value="put"></input>

                            <label>Name</label>
                            <input class="form-control bg-transparent" type="text" value="{{$customer->name}}" name="name"></input>
                            <br>

                            <label>Primary Phone Number</label>
                            <input class="form-control bg-transparent" type="int" value="{{$customer->primary_contact_number}}" name="primary_contact_number"></input>
                            <br>

                            <label>Secondary Phone Number</label>
                            <input class="form-control bg-transparent" type="int" value="{{$customer->secondary_contact_number}}" name="secondary_contact_number"></input>
                            <br>

                            <label>Profession</label>
                            <input class="form-control bg-transparent" type="int" value="{{$customer->profession}}" name="profession"></input>
                            <br>

                            <label>Location</label>
                            <select class="form-control bg-transparent" name="location_id">
                                @foreach($locations as $location)
                                    @if($location->id == $customer->location->id)
                                        <option selected value="{{$location->id}}">{{ $location->name }}</option>
                                    @else
                                        <option value="{{$location->id}}">{{ $location->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <br>


                            <label>Email</label>
                            <input class="form-control bg-transparent" type="email" name="email" value="{{$customer->email}}"></input>
                            <br>

                            <label>Email Secondary</label>
                            <input class="form-control bg-transparent" type="email" name="email_secondary" value="{{$customer->email_secondary}}"></input>
                            <br>

                            <label>Company</label>
                            <input class="form-control bg-transparent" type="email" name="company" value="{{$customer->company}}"></input>
                            <br>

                            <label>Website</label>
                            <input class="form-control bg-transparent" type="text" name="website" value="{{$customer->website}}"></input>
                            <br>
                            
                            <label>City</label>
                            <input class="form-control bg-transparent" type="text" name="city" value="{{$customer->city}}"></input>
                            <br>
                            
                            <label>Country</label>
                            <input class="form-control bg-transparent" type="text" name="country" value="{{$customer->country}}"></input>
                            <br>

                            <label>Address</label>
                            <input class="form-control bg-transparent" type="text" name="address" value="{{$customer->address}}"></input>
                            <br>

                            <label>Postal Code</label>
                            <input class="form-control bg-transparent" type="text" name="postal_code" value="{{$customer->postal_code}}"></input>
                            <br>

                            <label>Note</label>
                            <input class="form-control bg-transparent" type="text" name="note" value="{{$customer->note}}"></input>
                            <br>

                            <button class="btn btn-primary" type="submit">Save</button>
                        </form>

                        <form method="POST" action="{{route('customers.destroy', ['customer'=>$customer->id])}}">
                            @csrf
                            <input type="hidden" name="_method" value="delete"></input><br>
                            <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
