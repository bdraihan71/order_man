@extends('layouts.app')

@section('content')
    <div class="row mb-2 border-bottom">
        <div class="col-md-12">
            <h1>Add Items to Order</h1>
        </div>
    </div>

    <form action="{{ route('update-order-item', ['item' => $item->id]) }}" method="POST">
        @csrf

        <datalist id="services">
            @foreach (App\Service::all() as $service)
                <option value="{{ $service->id }}">{{ $service->title }}</option>
            @endforeach
        </datalist>

        <datalist id="vendors">
            @foreach (App\Vendor::all() as $vendor)
                <option value="{{ $vendor->id }}">{{ $vendor->company_name }}</option>
            @endforeach
        </datalist>

        <datalist id="users">
            @foreach (App\User::all() as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </datalist>

        <div class="row mb-2">
            <div class="col-md-3">
                <input type="text" name="service_id" value="{{ $item->service_id }}" class="form-control" list="services" placeholder="Service">
            </div>
            <div class="col-md-3">
                <input type="text" name="vendor_id" value="{{ $item->vendor_id }}" class="form-control" list="vendors" placeholder="Vendor">
            </div>
            <div class="col-md">
                <input type="number" name="service_price" value="{{ $item->service_price }}" class="form-control" placeholder="Price">
            </div>
            <div class="col-md">
                <input type="number" name="service_commission" value="{{ $item->service_commission }}" class="form-control" placeholder="Commission">
            </div>
            <div class="col-md">
                <input type="number" name="review" class="form-control" value="{{ $item->review }}" placeholder="Review">
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-1 my-auto">
                Delivery Time:
            </div>
            <div class="col-md-3">
                <input type="datetime-local" name="delivery_time" value="{{ str_replace(' ', 'T', $item->delivery_time) }}" class="form-control" placeholder="Delivery Time">
            </div>
            <div class="col-md-1 my-auto">
                Booked At:
            </div>
            <div class="col-md-3">
                <input type="datetime-local" name="booked_at" value="{{ str_replace(' ', 'T', $item->booked_at) }}" class="form-control" placeholder="Booked At">
            </div>
            <div class="col-md-1 my-auto">
                Booked By:
            </div>
            <div class="col-md-3">
                <input type="text" name="booked_by" class="form-control" value="{{ $item->booked_by }}" list="users" placeholder="Booked By">
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-6">
                <textarea name="comment_by_category_manager" class="form-control" cols="30" rows="5">{{ $item->comment_by_category_manager }}</textarea>
            </div>
            <div class="col-md-6">
                <textarea name="booking_note" class="form-control" cols="30" rows="5">{{ $item->booking_note }}</textarea>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-4">
                <div class="row mb-2">
                    <div class="col-md-3 my-auto">
                        Cancelled At:
                    </div>
                    <div class="col-md-9">
                        <input type="datetime-local" name="cancelled_at" value="{{ str_replace(' ', 'T', $item->cancelled_at) }}" class="form-control" placeholder="Cancelled At">
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-3 my-auto">
                        Cancelled By:
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="cancelled_by" class="form-control" value="{{ $item->cancelled_by }}" list="users" placeholder="Cancelled By">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <textarea name="cancellation_note" class="form-control" rows="3">{{ $item->cancellation_note }}</textarea>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-4">
                <div class="row mb-2">
                    <div class="col-md-3 my-auto">
                        Fullfilled At:
                    </div>
                    <div class="col-md-9">
                        <input type="datetime-local" name="fullfilled_at" value="{{ str_replace(' ', 'T', $item->fullfilled_at) }}" class="form-control" placeholder="Fullfilled At">
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-3 my-auto">
                        Fullfilled By:
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="fullfilled_by" value="{{ $item->fullfilled_by }}" class="form-control" list="users" placeholder="Fullfilled By">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <textarea name="fullfillment_note" class="form-control" rows="3">{{ $item->fullfillment_note }}</textarea>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-4">
                <select name="type" class="form-control">
                    <option value="{{ $item->type }}">{{ $item->type }}</option>
                    <option value="household">Household</option>
                    <option value="corporate customer">Corporate Customer</option>
                </select>
            </div>
            <div class="col-md-8 text-center">
                <button type="submit" class="btn btn-primary w-100 float-left" id="submit-btn">Update</button>
            </div>
        </div>
    </form>
@endsection