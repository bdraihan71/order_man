@extends('layouts.app')

@section('content')
<div class="row mb-2">
    <div class="col-md-12">
        <h1>Add Items to Order</h1>
    </div>
</div>
<form action="{{ route('update-order-item', ['item' => $item->id]) }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card bg-transparent my-3">
                <div class="card-header">
                    Item no: {{ $item->id }}
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-12 text-center">
                            <select name="service_id" class="form-control bg-transparent">
                                @if($item->service == null)
                                    <option value="">No Service</option>
                                @endif    
                                @foreach (App\Service::all() as $service)
                                    @if ($item->service_id != $service->id)
                                        <option value="{{ $service->id }}">{{ $service->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12 text-center">
                            <select name="vendor_id" class="form-control bg-transparent">
                                @if($item->vendor == null)
                                    <option value="">No Vendor</option>
                                @endif
                                    @foreach (App\Vendor::all() as $vendor)
                                        @if ($item->vendor_id != $vendor->id)
                                            <option value="{{ $vendor->id }}">{{ $vendor->company_name }}</option>
                                        @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <input type="number" name="service_price" value="{{ $item->service_price }}" class="form-control bg-transparent" placeholder="Price">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <input type="number" name="service_commission" value="{{ $item->service_commission }}" class="form-control bg-transparent" placeholder="Commission">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            Delivery Time: <br>
                            <input type="datetime-local" name="delivery_time" class="form-control bg-transparent" value="{{ explode(':', str_replace(' ', 'T', $item->delivery_time))[0].':'.explode(':', str_replace(' ', 'T', $item->delivery_time))[1].':00' }}" placeholder="Delivery Time">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <input type="number" name="review" class="form-control bg-transparent" max="5" min="0" value="{{ $item->review }}" placeholder="Review">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <input type="text" name="comment_by_category_manager" class="form-control bg-transparent" value="{{ $item->comment_by_category_manager }}" placeholder="Comment by Category Manager">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <select name="type" class="form-control bg-transparent">
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
                        <div class="col-md-12 text-center">
                            <select name="reference_id" class="form-control bg-transparent">
                                @if($item->reference == null)
                                    <option value="">No References</option>
                                @endif    
                                @foreach (App\Reference::all() as $reference)
                                    @if ($item->reference_id != $reference->id)
                                        <option value="{{ $reference->id }}">{{ $reference->name  }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12 text-center">
                            <select name="category_manager" class="form-control bg-transparent">
                                @if($item->user == null)
                                    <option value="">No Manager</option>
                                @endif    
                                @foreach (App\User::where('role_id', 2)->get() as $user)
                                    @if ($item->category_manager != $user->id)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-info w-100 float-left" id="submit-btn">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</form>
@endsection