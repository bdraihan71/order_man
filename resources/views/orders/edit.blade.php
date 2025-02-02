@extends('layouts.app')

@section('content')
<div class="row mb-2 border-bottom">
        <div class="col-md-12">
            <h1>Edit Order</h1>
        </div>
    </div>

    <form action="{{ route('update-order', ['order' => $order->id]) }}" method="POST">
        @csrf
        <div class="row mb-2">
            <div class="col-md-12">
                <select name="customer_id" class="form-control">
                    <option value="{{ $order->customer_id }}">{{ $order->customer->name }} {{ $order->customer->primary_contact_number }}</option>
                    @foreach ($customers as $customer)
                        @if ($order->customer_id != $customer->id)
                            <option value="{{ $customer->id }}">{{ $customer->name }} {{ $customer->primary_contact_number }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-12">
                <textarea name="booking_note" class="form-control" cols="30" rows="5">{{ $order->booking_note != null ? $order->booking_note : "Booking note not provided" }}</textarea>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-12 text-center">
                <button class="btn btn-primary w-75">Update Order</button>
            </div>
        </div>
    </form>
@endsection