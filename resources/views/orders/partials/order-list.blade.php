@if(count($order->items) > 0)
    <div class="table-responsive my-5">
    <div class="card">
        <div class="card-header">
            Order No: {{ $order->id }} for {{ $order->customer->name }} {{ $order->customer->primary_contact_number }}  
             <a href="{{ route('orders.show', ['order' => $order->id]) }}" class="float-right btn btn-sm btn-outline"><i class="fas fa-edit"></i></a>
        </div>
        <div class="card-body">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="thin-th" scope="col">Service</th>
                <th class="thin-th" scope="col">Price</th>
                <th class="thin-th" scope="col">Quantity</th>
                <th class="thin-th" scope="col">Total</th>
                <th class="thin-th" scope="col">Commission</th>
                <th class="thin-th" scope="col">Delivery Time</th>
                <th class="thin-th" scope="col">Type</th>
                <th class="thin-th" scope="col">Category Manager</th>
                <th class="thin-th" scope="col">Comment By Category Manager</th>
                <th class="thin-th" scope="col">Reference</th>
                <th class="thin-th" scope="col">Vendor</th>
                <th class="thin-th" scope="col">Review</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                    <tr>
                    @if($item->service)
                        <td>{{ $item->service->title }}</td>
                    @else
                        <td class="red">No service found</td>
                    @endif
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
            </tbody>
        </table>
        </div>
        
    </div>


       
    </div>

@else
    <div class="card">
        <div class="card-header">
            Order No: {{ $order->id }} for {{ $order->customer->name }} {{ $order->customer->primary_contact_number }}  
             <a href="{{ route('orders.show', ['order' => $order->id]) }}" class="float-right btn btn-sm btn-outline"><i class="fas fa-edit"></i></a>
        </div>
        <div class="card-body">
            <small>Empty order, consider deleteing this.</small>
        </div>
    </div>
@endif