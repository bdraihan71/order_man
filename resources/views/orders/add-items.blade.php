@extends('layouts.app')

@php
    $booking_time = explode(':', str_replace(' ', 'T', Carbon\Carbon::now()->toDateTimeString()))[0].':'.explode(':', str_replace(' ', 'T', Carbon\Carbon::now()->toDateTimeString()))[1].':00';

    $delivery_time = str_replace(' ', 'T', Carbon\Carbon::parse('tomorrow 9 AM')->toDateTimeString());
@endphp
@section('content')
    <script>
        function noContinue () {
            document.getElementById('continue').value = 0;
            document.getElementById('submit-btn').click();
        }
    </script>
    <div class="row mb-2 border-bottom">
        <div class="col-md-12">
            <h1>Add Items to Order</h1>
        </div>
    </div>

    <form action="{{ route('add-item-to-order', ['order' => $order->id]) }}" method="POST">
        @csrf

        <input type="hidden" name="order_id" value="{{ $order->id }}">
        <input type="hidden" name="continue" value="1" id="continue">

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Add Item to Order {{ $order->id }}
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-12 text-center">
                                <select name="service_id" class="form-control">
                                    <option value="">Please select a Service</option>
                                    @foreach (App\Service::all() as $service)
                                        <option value="{{ $service->id }}">{{ $service->title }}</option>
                                    @endforeach
                                </select>
                                <a href="{{ route('services.create') }}" class="btn btn-primary w-50">Create Service</a>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12 text-center">
                                <select name="vendor_id" class="form-control">
                                    <option value="">Please select a Vendor</option>
                                    @foreach (App\Vendor::all() as $vendor)
                                        <option value="{{ $vendor->id }}">{{ $vendor->company_name }}</option>
                                    @endforeach
                                </select>
                                <a href="{{ route('vendors.create') }}" class="btn btn-primary w-50">Create Vendor</a>
                            </div>
                        </div>
        
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <input type="number" name="service_price"  value="{{old('service_price')}}" class="form-control" placeholder="Price">
                            </div>
                        </div>
        
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <input type="number" name="service_commission" value="{{old('service_commission')}}"  class="form-control" placeholder="Commission">
                            </div>
                        </div>
        
                        <div class="row mb-3">
                            <div class="col-md-12">
                                Delivery Time: <br>
                                <input type="datetime-local" name="delivery_time" class="form-control" value="{{ old('delivery_time') === null ? $delivery_time : old('delivery_time')  }}" placeholder="Delivery Time">
                            </div>
                        </div>
        
                        <div class="row mb-3">
                            <div class="col-md-12">
                                Booking Time: <br>
                                <input type="datetime-local" name="booked_at" class="form-control" value="{{ old('booked_at') === null ? $booking_time : old('booked_at') }}" placeholder="Booked At">
                            </div>
                        </div>
        
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <select name="type" class="form-control">
                                    @if(old('type') == "household")
                                        <option value="household" selected>Household</option>
                                        <option value="corporate customer">Corporate Customer</option>
                                    @else
                                        <option value="household" >Household</option>
                                        <option value="corporate customer" selected>Corporate Customer</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12 text-center">
                                <select name="category_manager" class="form-control">
                                    <option value="">Please select a category manager</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
        
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary w-50 float-left" id="submit-btn">Add More Items</button>
                                <a href="#" class="btn btn-danger w-50 float-left" onclick="noContinue()">Done</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-mb-3"></div>
        </div>
    </form>

    @foreach ($order->items as $item)
    <div class="row mb-3">
        <div class="col-md-3">
            {{ $item->service->title }}
        </div>
        <div class="col-md-2">
            {{ $item->service_price }}
        </div>
        <div class="col-md-2">
            {{ $item->service_commission }}
        </div>
        <div class="col-md-2">
            {{ ucfirst($item->type) }}
        </div>
        <div class="col-md-2">
            {{ $item->delivery_time }}
        </div>
        <div class="col-md-2">
            {{ $item->vendor->company_name }}
        </div>
        <div class="col-md-1">
            <a onclick="return confirm('Are you sure you want to delete this item?');" href="{{ route('delete-item', ['item' => $item->id]) }}"><i class='fa fas fa-trash'></i></a>
        </div>
    </div>
    @endforeach
@endsection