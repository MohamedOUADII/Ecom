@extends('layouts.app')

@section('content')


<div class="d-sm-flex justify-content-between align-items-center mb-4">
        <span ><br/></span>
</div>
<div class="row justify-content-md-center">
                <div class="col-lg-6">
                        <div class="card shadow border-left-primary py-2">
                        <h3 class="text-center font-weight-light my-4">Edit Customer</h3>
                        <hr><hr>
                                <div class="card-body">
                                  <div class="p-5">

                                      <form class="user" method="post" action="{{ url('/customers/update') }}" >
                                      @csrf
                                            
                                      <div class="form-group"><input class="form-control form-control-user" type="hidden"  value="{{ $customer->id }}" name="id"></div>

                                      <div class="form-group">
                                          <label class="small mb-1" >Username</label>
                                          <input class="form-control form-control-user" type="text"  value="{{ $customer->username }}" name="username"></div>
                                          
                                          <div class="form-group">
                                          <label class="small mb-1" >Last Name</label>
                                          <input class="form-control form-control-user" type="text"  value="{{ $customer->last_name }}" name="last_name"></div>
                                          <div class="form-group">
                                          <label class="small mb-1" >First Name</label>
                                          <input class="form-control form-control-user" type="text" value="{{ $customer->first_name }}" name="first_name"></div>
                                          <div class="form-group">
                                          <label class="small mb-1" >Email</label>
                                          <input class="form-control form-control-user" type="text"  value="{{ $customer->email }}" name="email"></div>
                                          <div class="form-group">
                                          <label class="small mb-1" >Address</label>
                                          <input class="form-control form-control-user" type="text"  value="{{ $customer->billing->address_1 }}" name="address"></div>
                                          <div class="form-group">
                                          <label class="small mb-1" >City</label>
                                          <input class="form-control form-control-user" type="text"  value="{{ $customer->billing->city }}" name="city"></div>
                                          <div class="form-group">
                                          <label class="small mb-1" >State</label>
                                          <input class="form-control form-control-user" type="text"  value="{{ $customer->billing->state }}" name="state"></div>
                                          <div class="form-group">
                                          <label class="small mb-1" >Country</label>
                                          <input class="form-control form-control-user" type="text"  value="{{ $customer->billing->country }}" name="country"></div>
                                          <div class="form-group">
                                          <label class="small mb-1" >Zip code</label>
                                          <input class="form-control form-control-user" type="text"  value="{{ $customer->billing->postcode }}" name="zipcode"></div>
                                          <div class="form-group">
                                          <label class="small mb-1" >Phone</label>
                                          <input class="form-control form-control-user" type="text"  value="{{ $customer->billing->phone }}" name="phone"></div>
                                                <hr>
                                          <button class="btn btn-primary" type="submit" >Update Customer</button>
                                          
                                      </form>
                                  </div>
                                </div>
                        </div>
                </div>

 </div>

 @endsection