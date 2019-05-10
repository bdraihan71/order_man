@extends('layouts.app')

@section('content')
    <div class="row mb-4">
        <div class="col-md-12">
            <h1>Order no: {{ $order->id }}</h1> <br>
            <h3>
                Customer: {{ $order->customer->name }}
                <a onclick="return confirm('Are you sure you want to delete this item?');" href="{{ route('delete-order', ['order' => $order->id]) }}" class="float-right ml-3"><i class="fa fas fa-trash"></i></a>
                <a href="{{ route('orders.edit', ['order' => $order->id]) }}" class="float-right"><i class='far fa-edit'></i></a>
            </h3>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-12 text-center">
            <a href="{{ route('add-item-to-order', ['order' => $order->id]) }}" class="btn btn-success w-75">Add Item</a>
        </div>
    </div>

    @foreach ($order->items as $item)
        <div class="row mb-4">
            <div class="col-md-3">
                {{ $item->service->title }}
            </div>
            <div class="col-md-2">
                {{ $item->service_price }}
            </div>
            <div class="col-md-2">
                {{ $item->service_commission }}
            </div>
            <div class="col-md-1">
                {{ $item->review }}
                <i class= "fas fa-star"></i>
            </div>
            <div class="col-md-1">
                <a onclick="return confirm('Are you sure you want to delete this item?');" href="{{ route('delete-item', ['item' => $item->id]) }}" class="float-right ml-3"><i class='fa fas fa-trash'></i></a>
                <a href="{{ route('edit-order-item', ['item' => $item->id]) }}" class="float-right"><i class='far fa-edit'></i></a>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-2">
                Delivery Time: {{ $item->delivery_time }}
            </div>
            <div class="col-md-2">
                Type: {{ $item->type }}
            </div>
            <div class="col-md-8">
                Comment By Category Manager: {{ $item->comment_by_category_manager }}
            </div>
            <div class="col-md-8">
                Vendor: {{ $item->vendor->company_name }}
            </div>
        </div>

        {{-- <div class="row mb-4">
            <div class="col-md-2">
                Booked By: {{ $item->bookedBy->name }}
            </div>
            <div class="col-md-2">
                Booked At: {{ $item->booked_at }}
            </div>
            <div class="col-md-8">
                Booking Note: {{ $item->booking_note }}
            </div>
        </div> --}}
        {{-- <div class="row mb-4">
            <div class="col-md-2">
                Cancelled By: {{ $item->cancelledBy->name }}
            </div>
            <div class="col-md-2">
                Cancelled At: {{ $item->cancelled_at }}
            </div>
            <div class="col-md-8">
                Cancellation Note: {{ $item->cancellation_note }}
            </div>
        </div> --}}
        {{-- <div class="row mb-4">
            <div class="col-md-2">
                Fullfilled By: {{ $item->fullfilledBy->name }}
            </div>
            <div class="col-md-2">
                Fullfilled At: {{ $item->fullfilled_at }}
            </div>
            <div class="col-md-8">
                Fullfillment Note: {{ $item->fullfillment_note }}
            </div>
        </div> --}}
        <hr>
    @endforeach
@endsection