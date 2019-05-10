@extends('layouts.app')

@section('content')
    <div class="row mb-2 border-bottom">
        <div class="col-md-12">
            <h1>Create Order</h1>
        </div>
    </div>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="row mb-2">
            <div class="col-md-12">
                <select name="customer_id" class="form-control">
                    <option value="">Please select a customer</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <textarea name="booking_note" class="form-control" cols="30" rows="5">Booking Comment</textarea>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-12 text-center">
                <a href="{{ route('customers.create') }}" target="_blank" class="btn btn-success w-50 float-left">Create Customer</a>
                <button class="btn btn-primary w-50 float-left">Create Order</button>
            </div>
        </div>
    </form>
@endsection