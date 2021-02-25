@extends('layouts.log')

@section('content')

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Welcome</h3></div>
                                    <div class="card-body">
                                        <form   class="user" method="post" action="{{ url('/connection') }}">

                                            @csrf
                                          
                                            <div class="form-group">
                                            @if(session()->has("msg"))
                                                <div class="invalid-feedback">
                                                        {{ session()->get('msg') }}
                                                </div>
                                                @endif
                                                <label class="small mb-1" for="inputEmailAddress">url</label>
                                                
                                                <input class="form-control py-4" type="text"  placeholder="Enter URL..." name="host">
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">key</label>
                                                
                                                <input class="form-control py-4" type="password"  placeholder="Enter API Key..." name="key">
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Secret</label>
                                                
                                                <input class="form-control py-4" type="password"  placeholder="Enter API Secret..." name="secret">
                                            </div>
                                            @if(session()->has("msg"))
                                                <div class="alert alert-danger">
                                                        {{ session()->get('msg') }}
                                                </div>
                                                @endif
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            
                                                <button  class="btn btn-primary" type="submit">Login</button>
                                            </div>


                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>


@endsection