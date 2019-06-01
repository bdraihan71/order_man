@extends('layouts.app')

@section('content')
    <div class="row mb-2">
        <div class="col-md-12">
            <h1>Create Order</h1>
        </div>
    </div>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="row mb-2">
            <div class="col-md-12">
                <select name="customer_id" class="form-control bg-transparent">
                    <option value="">Please select a customer</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }} {{$customer->primary_contact_number}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <textarea name="booking_note" class="form-control bg-transparent" cols="30" rows="5" placeholder="Booking Comment"></textarea>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-6 text-center">
                <a href="{{ route('customers.create') }}" target="_blank" class="btn btn-success w-100 mb-2">Create Customer</a>
            </div>
            <div class="col-md-6 text-center">
                <button class="btn btn-primary w-100">Create Order</button>
            </div>
        </div>
    </form>
@endsection