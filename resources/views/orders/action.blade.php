@extends('layouts.app')

@section('content')
    <form action="{{ route('order.action', ['order' => $order->id]) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card bg-transparent my-3">
                    <div class="card-header">
                        Action for Order no: {{ $order->id }}
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <select name="action" class="form-control bg-transparent">
                                    @if ($order->action > 0)
                                        <option value="1">Completed</option>
                                        <option value="-1">Cancelled</option>
                                    @elseif ($order->action < 0)
                                        <option value="-1">Cancelled</option>
                                        <option value="1">Completed</option>
                                    @else
                                        <option value="">Please select an action</option>
                                        <option value="-1">Cancelled</option>
                                        <option value="1">Completed</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <textarea name="action_note" class="form-control bg-transparent" cols="30" rows="5">{{ $order->action == null ? "Action Comment" : ($order->action_note == null ? "Action note not provided" : $order->action_note) }}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-info w-100" type="submit">Submit Action</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </form>
@endsection