@extends('layouts.app')

@section('content')

<div class="d-sm-flex justify-content-between align-items-center mb-4">
        <span ><br/></span>
</div>
<div class="row justify-content-md-center">
                <div class="col-lg-6">
                        <div class="card shadow border-left-primary py-2">
                        <h3 class="text-center font-weight-light my-4">Edit Coupon</h3>
                        <hr><hr>
                                <div class="card-body">
                                  <div class="p-5">

                                      <form class="user" method="post" action="{{ url('/coupons/update') }}" >
                                      @csrf
                                      
                                      <div class="form-group"><input class="form-control form-control-user" type="hidden"  value="{{ $coupon->id }}" name="id"></div>
                                          <div class="form-group">
                                          <label class="small mb-1" >Code</label>
                                          <input class="form-control form-control-user" type="text"  value="{{ $coupon->code }}" name="code"></div>
                                          <div class="form-group">
                                          <label class="small mb-1" >Amount</label>
                                          <input class="form-control form-control-user" type="text"  value="{{ $coupon->amount }}" name="amount"></div>
                                          <div class="form-group">
                                          <label class="small mb-1" >Description</label>
                                          <input class="form-control form-control-user" type="text"  value="{{ $coupon->description }}" name="description"></div>

                                                <hr>
                                          <button class="btn btn-primary" type="submit" >Update Coupon</button>
                                          
                                      </form>
                                  </div>
                                </div>
                        </div>
                </div>

 </div>

 @endsection
