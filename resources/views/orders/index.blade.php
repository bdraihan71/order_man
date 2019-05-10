@extends('layouts.app')

@section('content')
    <div class="row mb-2 border-botttom">
        <div class="col-md-10">
            <h1>All Orders</h1>
        </div>
        <div class="col-md-2">
            <a href="{{ route('orders.create') }}" class="btn btn-primary">Create Order</a>
        </div>
    </div>
    @foreach($orders as $order)
        <div class="card mb-4">
            <div class="card-header">
                <div class="row mb-2">
                    <div class="col-md-10">
                        Order No: {{ $order->id }} for {{ $order->customer->name }}
                    </div>
                    <div class="col-md-2">
                        {{ $order->action == null ? "Booked" : ($order->action < 0 ? "Cancelled" : "Provided") }}
                        <a href="{{ route('orders.show', ['order' => $order->id]) }}" class="btn btn-primary float-right">Show</a>
                    </div>
                </div>
                <div class="row border-top">
                    <div class="col-md-3 mt-3">
                        <p class="text-center small">Service</p>
                    </div>
                    <div class="col-md-1 mt-3">
                        <p class="text-center small">Price</p>
                    </div>
                    <div class="col-md-1 mt-3">
                        <p class="text-center small">Commission</p>
                    </div>
                    <div class="col-md-2 mt-3">
                        <p class="text-center small">Customer Type</p>
                    </div>
                    <div class="col-md-2 mt-3">
                        <p class="text-center small">Time</p>
                    </div>
                    <div class="col-md-2 mt-3">
                        <p class="text-center small">Vendor</p>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if (count($order->items) == 0)
                    <h4 class="text-center">No items</h4>
                @else
                    @foreach ($order->items as $item)
                        <div class="row mb-3 text-center">
                            <div class="col-md-3">
                                {{ $item->service->title }}
                            </div>
                            <div class="col-md-1">
                                {{ $item->service_price }}
                            </div>
                            <div class="col-md-1">
                                {{ $item->service_commission }}
                            </div>
                            <div class="col-md-2">
                                {{ ucfirst($item->type) }}
                            </div>
                            <div class="col-md-2">
                                {{ $item->delivery_time }}
                            </div>
                            <div class="col-md-2">
                                Vendor: {{ $item->vendor->company_name }}
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    @endforeach

    <div class="row">
        <div class="col-md-12">
            {{ $orders->links() }}
        </div>
    </div>
@endsection