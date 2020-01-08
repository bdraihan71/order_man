@extends('layouts.app')

@section('content')
    <div class="row my-3">
        <div class="col-md-3 my-2">
            <h1 class="h3">All Orders</h1>
        </div>
        <div class="col-md-6 my-2">
            <form action="{{ route('orders.index') }}" method="GET">
                <input type="text" name="item" class="form-control bg-transparent" placeholder="Type to search">
            </form>
        </div>
        <div class="col-md-3 text-sm-right my-2">
            <a href="{{ route('orders.create') }}" class="btn btn-outline-info">Create Order</a>
        </div>
    </div>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-item nav-link active" id="nav-booked-tab" data-toggle="tab" href="#nav-booked" role="tab" aria-controls="nav-booked" aria-selected="true">Booked</a>
        </li>
        <li class="nav-item">
            <a class="nav-item nav-link" id="nav-pending-tab" data-toggle="tab" href="#nav-pending " role="tab" aria-controls="nav-pending " aria-selected="true">Pending </a>
        </li>
        <li class="nav-item">
            <a class="nav-item nav-link" id="nav-completed-tab" data-toggle="tab" href="#nav-completed" role="tab" aria-controls="nav-completed" aria-selected="false">Completed</a>
        </li>
        <li class="nav-item">
            <a class="nav-item nav-link" id="nav-cancelled-tab" data-toggle="tab" href="#nav-cancelled" role="tab" aria-controls="nav-cancelled" aria-selected="false">Cancelled</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="nav-booked" role="tabpanel" aria-labelledby="nav-booked-tab">
            @include('orders.partials.booked')
        </div>
        <div class="tab-pane fade show " id="nav-pending" role="tabpanel" aria-labelledby="nav-pending-tab">
            @include('orders.partials.pending')
        </div>
        <div class="tab-pane fade" id="nav-completed" role="tabpanel" aria-labelledby="nav-completed-tab">
            @include('orders.partials.completed')
        </div>
        <div class="tab-pane fade" id="nav-cancelled" role="tabpanel" aria-labelledby="nav-cancelled-tab">
            @include('orders.partials.cancelled')
        </div>
    </div>
    
@endsection

@section('scripts')
    <script type="text/javascript">
    $(document).ready(function() {
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTabAccounts', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTabAccounts');
        if (activeTab) {
        $('#myTab a[href="' + activeTab + '"]').tab('show');
        }else{
        $('#myTab a[href="#nav-booked"]').tab('show');
        }
    });
</script>
@endsection