@extends('layouts.app')

@section('content')
    <div id="app">
        <div class="container">
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
                
                            <label class="star">Type</label>
                            <select class="form-control bg-transparent" name="subcategory_id" v-model="selected_type">
                                <option value="9999">What type of service do you want?</option>
                                <option value="Household">Household</option>
                                <option value="Corporate">Corporate</option>
                                <option value="Other">Other</option>
                            </select>
                            <br>

                            <label class="star">Service</label>
                            <select @change="fetchService" class="form-control bg-transparent" name="subcategory_id" v-model="selected_service">
                                <option value="9999">Which service do you want?</option>
                                <option v-for="service in services"  v-bind:value="service.id">@{{ service.title }}</option>
                            </select>
                            <br>


                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <label>Quantity (@{{ this.service.data.unit}}):</label>
                                    <input class="form-control bg-transparent" type="text" name="quantity" v-model="quantity"></input>
                                </div>
                                <div class="col-md-4">
                                    <label class="star">Final Price (BDT)</label>
                                    <input class="form-control bg-transparent" type="text" name="price" v-model="price"></input>
                                </div>
                                <div class="col-md-4">
                                    <label>Asking Price Range (BDT):</label>
                                    <p class="border rounded p-2 text-center">@{{ this.service.data.min_price}} to @{{ this.service.data.max_price}}</p>
                                </div>
                            </div>
                            <div class="text-center">
                                <h4>Total Price: BDT @{{ this.total}}</h4>
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
                    <label class="star">Followup Date</label>
                    <input class="form-control bg-transparent" type="date" v-model="date">
                    <br>
                    <label class="star">Followup Time</label>
                    <input class="form-control bg-transparent" type="time" v-model="time">
                    <br>
                    <label class="star">Note</label>
                    <input class="form-control bg-transparent" type="text" name="price" v-model="note"></input>
                    <br>
                    </div>
                    <div v-if="this.response.success">
                        <p>All Good: @{{ this.response.data }}</p>
                    </div>
                    <div v-if="!this.response.success">
                        <p>Sorry!</p>
                        <ul>
                            <li v-for="data in this.response.data">@{{ data[0] }}</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                     <button v-if="this.response.button === true" class="btn btn-primary"  data-dismiss="modal" aria-label="Close">Close</button>
                    <button v-else="this.response.button !=== true" type="button" class="btn btn-primary" @click="pending">Pending</button>
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
                    <label class="star">Delivery Date</label>
                    <input class="form-control bg-transparent" type="date" v-model="date">
                    <br>
                    <label class="star">Delivery Time</label>
                    <input class="form-control bg-transparent" type="time" v-model="time">
                    <br>
                    <label class="star">Address</label>
                    <input class="form-control bg-transparent" type="text" name="price" v-model="address"></input>
                    <br>
                    <label class="star">Note</label>
                    <input class="form-control bg-transparent" type="text" name="price" v-model="note"></input>
                    <br>
                    </div>
                    <div v-if="this.response.success">
                        <p>All Good: @{{ this.response.data }}</p>
                    </div>
                    <div v-if="!this.response.success">
                        <p>Sorry!</p>
                        <ul>
                            <li v-for="data in this.response.data">@{{ data[0] }}</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button v-if="this.response.button === true" class="btn btn-primary"  data-dismiss="modal" aria-label="Close">Close</button>
                        <button v-else="this.response.button !=== true" class="btn btn-primary"  @click="book">Book</button>
                    </div>
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
                    user_id: {!! auth()->user()->id !!},
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
                    selected_type: 9999,
                    services: {!! json_encode($services) !!},
                    price: null,
                    quantity: 1,
                    total: 0,
                    time: '16:00',
                    note: null,
                    address: null,
                    action: 2,
                    date: '2019-10-26',
                    response: {
                        success: true,
                        data: {
                            
                        }
                    },
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
                        this.fetchCustomer();
                    }else{
                        this.customer = null;
                    }
                },

                quantity: function(val, oldVal){
                    this.total = val * this.price
                },

                price: function(val, oldVal){
                    this.total = val * this.quantity
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
                    if(this.mobile !== undefined && this.mobile !== null  && this.mobile !== ""){
                        console.log("fetching customer");
                        fetch('/api/customer/' + this.mobile)
                            .then(stream => stream.json())
                            .then(response => (this.customer = response))
                    }
                    
                },

                fetchService: function(){
                    console.log("fetching service");
                    fetch('/api/service/' + this.selected_service)
                    .then(stream => stream.json())
                    .then(response => (this.service = response))
                },

                book: function(){
                    console.log(this.mobile, this.name, this.user_id,
                     this.selected_location, this.selected_channel, this.selected_service, this.selected_type,
                     this.price, this.date, this.time, this.address, this.note );
                     fetch('/api/order?selected_location=' + this.selected_location + 
                     '&user_id=' + this.user_id + 
                     '&mobile=' + this.mobile + 
                     '&name=' + this.name + 
                     '&quantity=' + this.quantity + 
                     '&total=' + this.total + 
                     '&selected_channel=' + this.selected_channel + 
                     '&selected_service=' + this.selected_service + 
                     '&selected_type=' + this.selected_type + 
                     '&price=' + this.price + 
                     '&date=' + this.date + 
                     '&time=' + this.time + 
                     '&address=' + this.address + 
                     '&note=' + this.note)
                        .then(stream => stream.json())
                        .then(response => (this.response = response))
                },

                pending: function(){
                    console.log(this.mobile, this.name, this.user_id,
                    this.selected_location, this.selected_channel, this.selected_service, this.selected_type,
                    this.price, this.date, this.time, this.note, this.quantity, this.total, this.action );
                     fetch('/api/pending_order?selected_location=' + this.selected_location + 
                     '&user_id=' + this.user_id + 
                     '&mobile=' + this.mobile + 
                     '&name=' + this.name + 
                     '&quantity=' + this.quantity + 
                     '&total=' + this.total + 
                     '&selected_channel=' + this.selected_channel + 
                     '&selected_service=' + this.selected_service + 
                     '&selected_type=' + this.selected_type + 
                     '&price=' + this.price + 
                     '&date=' + this.date + 
                     '&time=' + this.time + 
                     '&action=' + this.action + 
                     '&note=' + this.note)
                        .then(stream => stream.json())
                        .then(response => (this.response = response))
                }
            }
        })
    </script>
@endsection
