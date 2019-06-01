@extends('layouts.app')

@section('content')

    <div class="row text-center my-5">
        <div class="col-md-3">
            <h1 class="text-info">Order no: {{ $order->id }}</h1>
        </div>
        <div class="col-md-1 my-auto">
                <span class="border border-warning h4">{{ $order->action == null ? "Booked" : ($order->action < 0 ? "Cancelled" : "Provided") }}</span>
        </div>
        <div class="col-md-2 my-auto">
            Customer: {{ $order->customer->name }}
        </div>
        <div class="col-md-2 my-auto">
            Booked at: {{ $order->booked_at }}
        </div>
        <div class="col-md-2 my-auto">
                Booking Note: {{ $order->booking_note == null ? "Booking note not provided" : ($order->booking_note == "Booking Comment" ? "Booking note not provided" : $order->booking_note) }}
        </div>
        <div class="col-md-2 my-auto">
            <a onclick="return confirm('Are you sure you want to delete this item?');" href="{{ route('delete-order', ['order' => $order->id]) }}"><i class="fa fas fa-trash pr-3 fa-2x text-info"></i></a>
            <a href="{{ route('orders.edit', ['order' => $order->id]) }}"><i class='far fa-edit pr-3 fa-2x text-info'></i></a>
            <a href="{{ route('order.action', ['order' => $order->id]) }}"><i class="fa fa-tools fa-2x text-info"></i></a>
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
            <a href="{{ route('add-item-to-order', ['order' => $order->id]) }}" class="btn btn-success w-50 mb-3">Add Item</a>
        </div>
    </div>

<<<<<<< HEAD
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
                <small>Receive Time: </small> {{ Carbon\Carbon::parse($item->delivery_time)->format('d/m/Y h:i a')}}
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
=======
    
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">Service</th>
                <th scope="col">Price</th>
                <th scope="col">Commission</th>
                <th scope="col">Delivery Time</th>
                <th scope="col">Type</th>
                <th scope="col">Category Manager</th>
                <th scope="col">Comment By Category Manager</th>
                <th scope="col">Reference</th>
                <th scope="col">Vendor</th>
                <th scope="col">Review</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($order->items as $item)
                <tr>
                    <td>{{ $item->service->title }}</td>
                    <td>{{ $item->service_price }}</td>
                    <td>{{ $item->service_commission }}</td>
                    <td>{{ $item->delivery_time }}</td>
                    <td>{{ $item->type }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->comment_by_category_manager }}</td>
                    <td>{{ $item->reference->name }}</td>
                    <td>{{ $item->vendor->company_name }}</td>
                    <td>{{ $item->review }}</td>
                    <td>
                        <a href="{{ route('edit-order-item', ['item' => $item->id]) }}"><i class='far fa-edit'></i></a>
                        <a onclick="return confirm('Are you sure you want to delete this item?');" href="{{ route('delete-item', ['item' => $item->id]) }}"><i class='fa fas fa-trash'></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
>>>>>>> c232f1df7d5929e88352ed912bd89d737c870c22
@endsection