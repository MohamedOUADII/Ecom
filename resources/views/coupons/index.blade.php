@extends('layouts.app')

@section('content')

<div class="container-fluid">
        <h1 class="mt-4">List of Coupons</h1>
        
        <div class="card mb-4">
            <div class="card-header">


                <a class= "btn btn-primary" href="{{url('/coupons/create')}}">Add New Coupon</a><!---->
                <a class= "btn btn-success" href = "{{url('/coupons/excel')}}">Export</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Code</th>
                            <th>Amount</th>
                            <th>Description</th>
                            <th>Date_created</th>
                            <th>Date_expires</th>
                            <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th>ID</th>
                            <th>Code</th>
                            <th>Amount</th>
                            <th>Description</th>
                            <th>Date_created</th>
                            <th>Date_expires</th>
                            <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody class="text-center" >
                            @foreach($coupons as $coupon)
                            <tr>
                                <td >{{ $coupon->id }}<br></td>
                            <td > {{$coupon->code}}<br></td>
                            <td>{{ $coupon->amount }} %</td>
                            <td > {{ $coupon->description }}</td>
                            <td >{{ $coupon->date_created }}</td>
                            <td>{{ $coupon->date_expires }}
                            <td ><form class="form inline" method="post" action = "{{url('coupons/delete')}}">
                            
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a class= "btn btn-primary" href="{{url('coupons/edit',$coupon->id)}}">Edit</a> | 
                            <button class= "btn btn-danger" name="id" value="{{ $coupon->id }}">Delete</button>
                            </form>
                            </td>
                            </tr>
                            
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
 
@endsection
