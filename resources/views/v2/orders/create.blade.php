@extends('layouts.app')

@section('content')
        <div class="container" id="app">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card bg-transparent my-3">
                        <div class="card-header">Customer</div>
                        <div class="card-body">
                
                            <label class="star">Mobile No.</label>
                            <input @change="fetchCustomer" v-model="mobile" class="form-control bg-transparent" type="text" name="title" value=""></input>
                            <br>
                
                
                            <label class="star">Name</label>
                            <input v-model="name" class="form-control bg-transparent" type="text" name="price" value=""></input>
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
                            <select class="form-control bg-transparent" name="subcategory_id">
                                <option value="">Please Select Type</option>
                                <option value="">Mr. X</option>
                                <option value="">Mr. Y</option>
                                <option value="">Mr. Z</option>
                            </select>
                            <br></div>
                    </div>

                    <div class="card bg-transparent my-3">
                        <div class="card-header">Order</div>
                        <div class="card-body">
                
                            <label class="star">Service</label>
                            <select class="form-control bg-transparent" name="subcategory_id">
                                <option value="">Please Select Type</option>
                                <option value="">Household</option>
                                <option value="">Corporate</option>
                                <option value="">Other</option>
                            </select>
                            <br>

                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <label class="star">Price Range</label>
                                    <input class="form-control bg-transparent" type="text" name="price" value=""></input>
                                </div>
                                <div class="col-md-4">
                                    <label></label>
                                    <p class="border rounded p-2 mt-2 text-center">1100 to 2500</p>
                                </div>
                            </div>
                            <br>
                
                            <button class="btn btn-info" type="" data-toggle="modal" data-target="#exampleModal1">Pending</button>
                            <button class="btn btn-info" type="" data-toggle="modal" data-target="#exampleModal2">Book</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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

    <!-- development version, includes helpful console warnings -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>


    <script>
        var app = new Vue({
            el: '#app',
            data() {
                return{
                    customer: null,
                    mobile: null,
                    name: null,
                }
            },
            watch: {
                customer: function(val, oldVal){
                    if(val != null && val.success == true){
                        this.name = val.data.name;
                    }else{
                        this.name = null;
                    }
                },

                mobile: function(val, oldVal){
                    if(val.length == 11){
                        console.log('hi');
                        this.fetchCustomer();
                    }else{
                        console.log("bye");
                        this.customer = null;
                    }
                }
            },
            methods: {
                fetchCustomer: function(){
                    console.log("fetching customer");
                    fetch('/api/customer/' + this.mobile)
                    .then(stream => stream.json())
                    .then(response => (this.customer = response))
                }
            }
        })
    </script>
@endsection
