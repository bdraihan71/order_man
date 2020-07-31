@foreach($cancelled_orders as $order)
    @include('orders.partials.order-list', compact('order'))
@endforeach

<div class="row">
    <div class="col-md-12">
        @if ($cancelled_orders instanceof \Illuminate\Pagination\AbstractPaginator)
            {{ $cancelled_orders->appends(Request::except('page'))->links() }}
        @endif
    </div>
</div>