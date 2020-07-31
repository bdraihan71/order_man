@foreach($pending_orders as $order)
    @include('orders.partials.order-list', compact('order'))
@endforeach


<div class="row">
    <div class="col-md-12">
        @if ($pending_orders instanceof \Illuminate\Pagination\AbstractPaginator)
            {{ $pending_orders->appends(Request::except('page'))->links() }}
        @endif
    </div>
</div>