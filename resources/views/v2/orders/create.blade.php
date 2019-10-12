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
                            <select class="form-control bg-transparent" name="subcategory_id" v-model="selected_location">
                                <option value="9999">Where are you from?</option>
                                <option v-for="location in locations" v-bind:value="location.id">@{{ location.name }}</option>
                            </select>
                            <br>

                            <label class="star">Channel</label>
                            <select class="form-control bg-transparent" name="subcategory_id" v-model="selected_channel">
                                <option value="9999">How did you know about us?</option>
                                <option v-for="channel in channels" v-bind:value="channel.id">@{{ channel.name }}</option>
                            </select>
                            <br>
                        </div>
                    </div>

                    <div class="card bg-transparent my-3">
                        <div class="card-header">Order</div>
                        <div class="card-body">
                
                            <label class="star">Service</label>
                            <select @change="fetchService" class="form-control bg-transparent" name="subcategory_id" v-model="selected_service">
                                <option value="9999">Which service do you want?</option>
                                <option v-for="service in services"  v-bind:value="service.id">@{{ service.title }}</option>
                            </select>
                            <br>

                            <label class="star">Type</label>
                            <select class="form-control bg-transparent" name="subcategory_id">
                                <option value="">What type of service do you want?</option>
                                <option value="">Household</option>
                                <option value="">Corporate</option>
                                <option value="">Other</option>
                            </select>
                            <br>

                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <label class="star">Final Price (BDT)</label>
                                    <input class="form-control bg-transparent" type="text" name="price" value=""></input>
                                </div>
                                <div class="col-md-6">
                                    <label>Asking Price Range (BDT):</label>
                                    <p class="border rounded p-2 text-center">@{{ this.service.data.min_price}} to @{{ this.service.data.max_price}}</p>
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
                    service: {
                        data: {
                            "min_price":0,
                            "max_price":0
                        }
                    },
                    mobile: null,
                    name: null,
                    channels: {!! json_encode($channels) !!},
                    locations: {!! json_encode($locations) !!},
                    selected_channel: 9999,
                    selected_location: 9999,
                    selected_service: 9999,
                    services: {!! json_encode($services) !!}
                }
            },
            watch: {
                customer: function(val, oldVal){
                    if(val != null && val.success == true){
                        this.name = val.data.name;
                        this.selected_channel = val.data.channel_id ? val.data.channel_id : 9999;
                        this.selected_location = val.data.location_id;
                    }else{
                        this.name = null;
                        this.selected_channel = 9999;
                        this.selected_location = 9999;
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
                },

                selected_service: function(val, oldVal){
                    if(val == 9999){
                        this.service = {
                        data: {
                            "min_price":0,
                            "max_price":0
                        }
                    }
                    }
                }
            },
            methods: {
                fetchCustomer: function(){
                    console.log("fetching customer");
                    fetch('/api/customer/' + this.mobile)
                    .then(stream => stream.json())
                    .then(response => (this.customer = response))
                },

                fetchService: function(){
                    console.log("fetching service");
                    fetch('/api/service/' + this.selected_service)
                    .then(stream => stream.json())
                    .then(response => (this.service = response))
                }
            }
        })
    </script>
@endsection
