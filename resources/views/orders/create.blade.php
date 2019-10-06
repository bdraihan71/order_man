@extends('layouts.app')

@section('content')
    {{-- <div class="row mb-2">
        <div class="col-md-12">
            <h1>Create Order</h1>
        </div>
    </div> --}}

    {{-- <form action="{{ route('orders.store') }}" method="POST">
        @csrf --}}
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                <div class="card bg-transparent my-3">
                    <div class="card-header">Create Order</div>
                    <div class="card-body">
            
                        <label class="star">Mobile No.</label>
                        <input class="form-control bg-transparent" type="text" name="title" value=""></input>
                        <br>
            
            
                        <label class="star">Name</label>
                        <input class="form-control bg-transparent" type="text" name="price" value=""></input>
                        <br>

                        <label class="star">Area</label>
                        <select class="form-control bg-transparent" name="subcategory_id">
                            <option value="">Please Select Area</option>
                            <option value="">Mohammadpur</option>
                            <option value="">Dhanmondi</option>
                            <option value="">Gulshan</option>
                        </select>
                        <br>

                        <label class="star">Type</label>
                        <select class="form-control bg-transparent" name="subcategory_id">
                            <option value="">Please Select Type</option>
                            <option value="">Household</option>
                            <option value="">Corporate</option>
                            <option value="">Other</option>
                        </select>
                        <br>

                        <label class="star">Reference</label>
                        <input class="form-control bg-transparent" type="text" name="price" value=""></input>
                        <br>

                        <label class="star">Service</label>
                        <input class="form-control bg-transparent" type="text" name="price" value=""></input>
                        <br>

                        <label class="star">Price Range</label>
                        <input class="form-control bg-transparent" type="text" name="price" value=""></input>
                        <br>
            
                        <button class="btn btn-info" type="" data-toggle="modal" data-target="#exampleModal1">Pending</button>
                        <button class="btn btn-info" type="" data-toggle="modal" data-target="#exampleModal2">Book</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
        {{-- <div class="row mb-2">
            <div class="col-md-12">
                <select name="customer_id" class="form-control bg-transparent">
                    <option value="">Please select a customer</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }} {{$customer->primary_contact_number}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <textarea name="booking_note" class="form-control bg-transparent" cols="30" rows="5" placeholder="Booking Comment"></textarea>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-6 text-center">
                <a href="{{ route('customers.create') }}" target="_blank" class="btn btn-success w-100 mb-2">Create Customer</a>
            </div>
            <div class="col-md-6 text-center">
                <button class="btn btn-primary w-100">Create Order</button>
            </div>
        </div> --}}
    {{-- </form> --}}

        <!-- Pending Modal -->
        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pending</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <label class="star">Follow Up Time</label>
                    <input class="form-control bg-transparent" type="text" name="price" value=""></input>
                    <br>
                    <label class="star">Note</label>
                    <input class="form-control bg-transparent" type="text" name="price" value=""></input>
                    <br>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Pending</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Book Modal -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <label class="star">Delivery Time</label>
                    <input class="form-control bg-transparent" type="text" name="price" value=""></input>
                    <br>
                    <label class="star">Address</label>
                    <input class="form-control bg-transparent" type="text" name="price" value=""></input>
                    <br>
                    <label class="star">Note</label>
                    <input class="form-control bg-transparent" type="text" name="price" value=""></input>
                    <br>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Book</button>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('scripts')
  <script type="text/javascript">
    $('#pendingModal').on('shown.bs.modal', function () {
     $('#myInput').trigger('focus')
    });

    $('#bookModal').on('shown.bs.modal', function () {
     $('#myInput').trigger('focus')
    });
  </script>
@endsection