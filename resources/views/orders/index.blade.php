@extends('layouts.app')

@section('content')
    <div class="row mb-2 border-botttom">
        <div class="col-md-12">
            <h1>All Orders</h1>
        </div>
    </div>
    @foreach($orders as $order)
        <a href="{{ route('orders.show', ['order' => $order->id]) }}">
            <div class="row mb-1">
                <div class="col-md-2">
                    Order No: {{ $order->id }}<br>
                    Customer Name: {{ $order->customer_id }}
                </div>
                <div class="col-md-10">
                    @foreach ($order->items as $item)
                        <div class="row mb-2">
                            <div class="col-md-2">
                                {{ $item->service->title }}
                            </div>
                            <div class="col-md-1">
                                {{ $item->service_price }}
                            </div>
                            <div class="col-md-1">
                                {{ $item->service_commission }}
                            </div>
                            <div class="col-md-2">
                                {{ $item->vendor->company_name }}
                            </div>
                            <div class="col-md-2">
                                {{ $item->bookedBy->name }}
                            </div>
                        </div>
                        @if ($loop->iteration != count($order->items))
                            <hr>
                        @endif
                    @endforeach
                </div>
            </div>
        </a>
        @if ($loop->iteration != count($orders))
            <hr>
        @endif
    @endforeach

    <div class="row">
        <div class="col-md-12">
            {{ $orders->links() }}
        </div>
    </div>
@endsection