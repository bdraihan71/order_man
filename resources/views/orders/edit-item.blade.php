@extends('layouts.app')

@section('content')
    <div class="row mb-2 border-bottom">
        <div class="col-md-12">
            <h1>Add Items to Order</h1>
        </div>
    </div>

    <form action="{{ route('update-order-item', ['item' => $item->id]) }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Item no: {{ $item->id }}
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-12 text-center">
                                <select name="service_id" class="form-control">
                                    <option value="{{ $item->service_id }}">{{ $item->service->title }}</option>
                                    @foreach (App\Service::all() as $service)
                                        @if ($item->service_id != $service->id)
                                            <option value="{{ $service->id }}">{{ $service->title }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <a href="{{ route('services.create') }}" class="btn btn-primary w-50">Create Service</a>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <input type="number" name="service_price" value="{{ $item->service_price }}" class="form-control" placeholder="Price">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                    <input type="number" name="service_commission" value="{{ $item->service_commission }}" class="form-control" placeholder="Commission">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                Delivery Time: <br>
                                <input type="datetime-local" name="delivery_time" class="form-control" value="{{ explode(':', str_replace(' ', 'T', $item->delivery_time))[0].':'.explode(':', str_replace(' ', 'T', $item->delivery_time))[1].':00' }}" placeholder="Delivery Time">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                Booking Time: <br>
                                <input type="datetime-local" name="booked_at" class="form-control" value="{{ explode(':', str_replace(' ', 'T', $item->booked_at))[0].':'.explode(':', str_replace(' ', 'T', $item->booked_at))[1].':00' }}" placeholder="Booked At">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <input type="number" name="review" class="form-control" max="5" min="0" value="{{ $item->review }}" placeholder="Review">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <select name="type" class="form-control">
                                    <option value="{{ $item->type }}">{{ ucfirst($item->type) }}</option>
                                    @if ($item->type == 'household')
                                        <option value="corporate customer">Corporate Customer</option>
                                    @else
                                        <option value="household">Household</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary w-100 float-left" id="submit-btn">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </form>
@endsection