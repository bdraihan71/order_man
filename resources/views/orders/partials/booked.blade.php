@foreach($booked_orders as $order)
    <div class="table-responsive my-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" colspan="4" class="text-info">Order No: {{ $order->id }} for {{ $order->customer->name }}</th>
                    <th scope="col" colspan="1">{{ $order->action == null ? "Booked" : ($order->action < 0 ? "Cancelled" : "Provided") }}</th>
                    <th scope="col" colspan="3"><a href="{{ route('orders.show', ['order' => $order->id]) }}" class="btn btn-info">Show</a></th>
                </tr>
            </thead>
            <thead>
               <tr>
                    <th scope="col">Service</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Commission</th>
                    <th scope="col">Delivery Time</th>
                    <th scope="col">Type</th>
                    <th scope="col">Category Manager</th>
                    <th scope="col">Comment By Category Manager</th>
                    <th scope="col">Reference</th>
                    <th scope="col">Vendor</th>
                    <th scope="col">Review</th>
                </tr>
            </thead>
            <tbody>
                @if (count($order->items) == 0)
                <tr>
                    <td colspan="6">
                        <h1 class="text-center text-info">No items</h1>
                    </td>
                </tr>
                @else
                @foreach ($order->items as $item)
                    <tr>
                    <td>{{ $item->service->title }}</td>
                    <td>{{ $item->service_price }}</td>
                    @if($item->quantity)
                        <td>{{ $item->quantity }}</td>
                    @else
                        <td class="red">No quantity found</td>
                    @endif
                    @if($item->total)
                        <td>{{ $item->total }}</td>
                    @else
                        <td class="red">No total found</td>
                    @endif
                    <td>{{ $item->service_commission }}</td>
                    <td>{{ $item->delivery_time }}</td>
                    <td>{{ $item->type }}</td>
                    <td>{{ $item->user == null ? 'No Manager' : $item->user->name }}</td>
                    <td>{{ $item->comment_by_category_manager }}</td>
                    <td>{{ $item->reference == null ? 'No References' : $item->reference->name }}</td>
                    <td>{{ $item->vendor ? $item->vendor->company_name : 'Unassigned'}}</td>
                    <td>{{ $item->review }}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    @endforeach

    <div class="row">
        <div class="col-md-12">
            {{ $booked_orders->links() }}
        </div>
    </div>