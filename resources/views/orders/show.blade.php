@extends('layouts.app')

@section('content')
    <div class="row mb-4">
        <div class="col-md-6">
            <h1>Order no: {{ $order->id }}<span class="border border-warning h4 ml-3 ">{{ $order->action == null ? "Booked" : ($order->action < 0 ? "Cancelled" : "Provided") }}</span></h1>
            <h3>
                Customer: {{ $order->customer->name }} <span class="float-right text-primary">Booked at: {{ $order->booked_at }}</span>
            </h3>
        </div>
        <div class="col-md-6">
            <a onclick="return confirm('Are you sure you want to delete this item?');" href="{{ route('delete-order', ['order' => $order->id]) }}" class="float-right ml-3"><i class="fa fas fa-trash"></i></a>
            <a href="{{ route('orders.edit', ['order' => $order->id]) }}" class="float-right"><i class='far fa-edit'></i></a>
            <a href="{{ route('order.action', ['order' => $order->id]) }}" class="float-right mr-4"><i class="fa fa-tools"></i></a>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-12">
            Booking Note: {{ $order->booking_note == null ? "Booking note not provided" : ($order->booking_note == "Booking Comment" ? "Booking note not provided" : $order->booking_note) }}
        </div>
    </div>

    @if ($order->action != null)
        <div class="row mb-4">
            <div class="col-md-12">
                {{ $order->action < 0 ? "Cancellation" : "Completion" }} Note: {{ $order->action_note == null ? "Action note not provided" : ($order->action_note == "Action Comment" ? "Action note not provided" : $order->action_note ) }}
            </div>
        </div>
    @endif

    <div class="row mb-4">
        <div class="col-md-12 text-center">
            <a href="{{ route('add-item-to-order', ['order' => $order->id]) }}" class="btn btn-success w-75">Add Item</a>
        </div>
    </div>

    @foreach ($order->items as $item)
        <div class="row mb-4">
            <div class="col-md-5">
                <p><Span class="small">Service -</span> {{ $item->service->title }}</p>
            </div>
            <div class="col-md-2">
                <p><Span class="small">Price -</span> {{ $item->service_price }}</p>
            </div>
            <div class="col-md-2">
                <p><Span class="small">Commission -</span> {{ $item->service_commission }}</p>
            </div>
            <div class="col-md-1">
                <p><Span class="small">Review -</span> {{ $item->review }} <i class= "fas fa-star"></i></p>
            </div>
            <div class="col-md-2">
                <Span class="small">Action -</span>
                <a href="{{ route('edit-order-item', ['item' => $item->id]) }}"><i class='far fa-edit'></i></a>
                <a onclick="return confirm('Are you sure you want to delete this item?');" href="{{ route('delete-item', ['item' => $item->id]) }}" class="ml-3"><i class='fa fas fa-trash'></i></a>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-3">
                <small>Delivery Time: </small> {{ $item->delivery_time }}
            </div>
            <div class="col-md-2">
                <small>Type:</small> {{ $item->type }}
            </div>
            <div class="col-md-3">
                <small>Comment By Category Manager:</small> {{ $item->comment_by_category_manager }}
            </div>

            <div class="col-md-2">
                <small>Category Manager:</small> {{ $item->user->name }}
            </div>

            <div class="col-md-2">
                <small>Vendor:</small> {{ $item->vendor == null ? "Vendor not selected" : $item->vendor->company_name }}
                <small>Reference:</small> {{ $item->reference->name }}
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