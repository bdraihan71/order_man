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
                    <td>{{ $item->user == null ? 'No Manager' : $item->user->name }}</td>
                    <td>{{ $item->comment_by_category_manager }}</td>
                    <td>{{ $item->reference == null ? 'No References' : $item->reference->name }}</td>
                    <td>{{ $item->vendor ? $item->vendor->company_name : 'Unassigned'}}</td>
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
@endsection