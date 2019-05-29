@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Statistics</div>
                    <div class="card-body">
                        <form action="" method="">
                            @csrf

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <select name="cat_man" class="form-control">
                                        @if ($request->cat_man == null)
                                            <option value="">Please select a Category Manager</option>
                                        @else
                                            <option value="{{ $request->cat_man }}">{{ App\User::find($request->cat_man)->name }}</option>
                                        @endif
                                        @foreach (App\Role::find(2)->user as $user)
                                            @if ($request->cat_man != $user->id)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select name="vendor" class="form-control">
                                        @if ($request->vendor == null)
                                        <option value="">Please select a Vendor</option>
                                        @foreach (App\Vendor::all() as $vendor)
                                            <option value="{{ $vendor->id }}">{{ $vendor->company_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select name="location" class="form-control">
                                        <option value="">Please select a Location</option>
                                        @foreach (App\Location::all() as $location)
                                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <select name="category" class="form-control">
                                        <option value="">Please select a Category</option>
                                        @foreach (App\Category::all() as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select name="service" class="form-control">
                                        <option value="">Please select a Service</option>
                                        @foreach (App\Service::all() as $service)
                                            <option value="{{ $service->id }}">{{ $service->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select name="customer" class="form-control">
                                        <option value="">Please select a Customer</option>
                                        @foreach (App\Customer::all() as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-4 my-auto">
                                            Start date: 
                                        </div>
                                        <div class="col-md-8">
                                            <input type="date" class="form-control" name="start">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-4 my-auto">
                                            Start date: 
                                        </div>
                                        <div class="col-md-8">
                                            <input type="date" class="form-control" name="end">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <select name="format" class="form-control">
                                        <option value="">Please select a View Type</option>
                                        <option value="day">Days</option>
                                        <option value="month">Months</option>
                                        <option value="year">years</option>
                                    </select>
                                </div>
                            </div>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection