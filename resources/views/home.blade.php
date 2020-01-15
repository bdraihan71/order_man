@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
                <div class="text-center">
                    <h1 class="display-4">Dashboard</h1>

                    <div class="lead">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        Role: {{Auth::user()->role->display_name}}
                    </div>
                </div>
                

                @foreach($orders as $order)
                    <a class="nostyle" href="{{ route('orders.show', $order->id)}}">
                        <div class="card text-white bg-warning mb-3" style="max-width: 35rem;">
                            <div class="card-header">
                                # {{$order->id}}   
                                <i class="far fa-user"></i> {{$order->customer->name}}  
                                <i class="fas fa-phone"></i> {{$order->customer->primary_contact_number}}
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Booked</h5>
                                <p class="card-text">{{$order->booking_note}}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                @foreach($order->items as $item)
                                    <li class="list-group-item  bg-warning">
                                        @if($item->service)
                                            {{$item->service->title}} <br>
                                       
                                            @if($item->quantity && $item->total)
                                            ‎   ৳ {{$item->service_price}} X {{$item->quantity}} = ‎৳ {{$item->total}}
                                            @else
                                                ৳ {{$item->service_price}}
                                            @endif
                                            <i class="far fa-calendar-alt"></i> {{$item->delivery_date}}
                                            <i class="far fa-clock"></i> {{$item->delivery_time}}
                                            <i class="fas fa-map-marker-alt"></i> {{$item->delivery_address}} <span class="badge badge-secondary">{{$item->type}}</span>
                                        @endif   
                                    </li>

                                @endforeach
                            </ul>
                            <div class="card-body text-right">
                                <p class="card-text"><small>created {{$order->created_at->diffForHumans()}}</small></p>
                                {{-- <a href="#" class="card-link">Edit</a>
                                <a href="#" class="card-link">Another link</a> --}}
                            </div>
                        </div>
                    </a>
                @endforeach
        </div>
    </div>
</div>
@endsection
