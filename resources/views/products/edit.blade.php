@extends('layouts.app')

@section('content')

<div class="d-sm-flex justify-content-between align-items-center mb-4">
        <span style="color: rgb(255,255,255);font-size: 20px;font-family: 'Baloo Bhaijaan', cursive;">Edit product</span>
</div>
<div class="row justify-content-md-center">
                <div class="col-lg-6">
                <div class="card shadow border-left-primary py-2">
                        <h3 class="text-center font-weight-light my-4">Edit Product</h3>
                        <hr><hr>
                                <div class="card-body">
                                  <div class="p-5">

                                      <form class="user" method="post" action="{{ url('/products/update') }}" >
                                      @csrf

                                      <div class="form-group"><input class="form-control form-control-user" type="hidden"  value="{{ $product->id }}" name="id"></div>
                                          <div class="form-group">
                                          <label class="small mb-1" >Name</label>
                                          <input class="form-control form-control-user" type="text" value="{{ $product->name }}"  name="name"></div>
                                          <div class="form-group">
                                          <label class="small mb-1" >Type</label>
                                          
                                          <select class="form-control"  name="type">
                                                        <option >simple</option>
                                                        <option >grouped</option>
                                                        <option >external</option>
                                                        <option >variable</option>
                                            </select>
                                          </div>
                                          <div class="form-group">
                                          <label class="small mb-1" >Price</label>
                                          <input class="form-control form-control-user" type="text"  value="{{ $product->price }}"  name="price"></div>
                                          <div class="form-group">
                                          <label class="small mb-1" >Short_description</label>
                                          <input class="form-control form-control-user" type="text"  value="{{ $product->short_description }}"  name="short_description"></div>
                                          <div class="form-group">
                                          <label class="small mb-1" >Description</label>
                                          <input class="form-control form-control-user" type="text"  value="{{ $product->description }}"  name="description"></div>
                                          <div class="form-group">
                                          <label class="small mb-1" >Categorie</label>
                                          <select class="form-control"  name="categorie">
                                                @foreach($categories as $categorie)
                                                        <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                                @endforeach
                                            </select></div>
                                          <div class="form-group">
                                          <label class="small mb-1" >Image</label>
                                          <input class="form-control form-control-user" type="text"  value="{{ $product->images[0]->src }}"  name="image"></div>
                                                <hr>
                                          <button class="btn btn-primary" type="submit" >Update Product</button>
                                          
                                      </form>
                                  </div>
                                </div>
                        </div>
                </div>

 </div>

 @endsection
