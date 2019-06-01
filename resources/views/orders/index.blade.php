@extends('layouts.app')

@section('content')
    <div class="row my-3">
        <div class="col-md-3 my-2">
            <h1 class="h3">All Orders</h1>
        </div>
        <div class="col-md-6 my-2">
            <form action="{{ route('orders.index') }}" method="GET">
                <input type="text" name="item" class="form-control bg-transparent" placeholder="Type to search">
            </form>
        </div>
        <div class="col-md-3 text-sm-right my-2">
            <a href="{{ route('orders.create') }}" class="btn btn-outline-info">Create Order</a>
        </div>
    </div>
    @foreach($orders as $order)
    <div class="table-responsive my-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" colspan="4" class="text-info">Order No: {{ $order->id }} for {{ $order->customer->name }}</th>
                    <th scope="col" colspan="1">{{ $order->action == null ? "Booked" : ($order->action < 0 ? "Cancelled" : "Provided") }}</th>
                    <th scope="col" colspan="1"><a href="{{ route('orders.show', ['order' => $order->id]) }}" class="btn btn-info">Show</a></th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th scope="col">Service</th>
                    <th scope="col">Price</th>
                    <th scope="col">Commission</th>
                    <th scope="col">Customer Type</th>
                    <th scope="col">Time</th>
                    <th scope="col">Vendor</th>
                </tr>
            </thead>
            <tbody>
                @if (count($order->items) == 0)
                <tr>
                    <td colspan="6">
                        <h1 class="text-center text-info">No items</h1>
                    </td>
                </tr>
                @else
                @foreach ($order->items as $item)
                    <tr>
                        <td>{{ $item->service->title }}</td>
                        <td>{{ $item->service_price }}</td>
                        <td> {{ $item->service_commission }}</td>
                        <td>{{ ucfirst($item->type) }}</td>
                        <td>{{ $item->delivery_time }}</td>
                        <td>{{ $item->vendor != null ? $item->vendor->company_name : '' }}</td>
                    </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    @endforeach

    <div class="row">
        <div class="col-md-12">
            {{ $orders->links() }}
        </div>
    </div>
@endsection