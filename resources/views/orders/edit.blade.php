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
                    <option value="{{ $order->customer_id }}">{{ $order->customer->name }}</option>
                    @foreach ($customers as $customer)
                        @if ($order->customer_id != $customer->id)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-12 text-center">
                <button class="btn btn-primary w-75">Update Order</button>
            </div>
        </div>
    </form>
@endsection