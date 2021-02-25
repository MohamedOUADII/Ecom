@extends('layouts.app')

@section('content')


<div class="container-fluid">
        <h1 class="mt-4">List of Orders</h1>
        
        <div class="card mb-4">
        <div class="card-header">
            <a class= "btn btn-success" href = "{{url('/orders/excel')}}">Export</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Orders Number</th>
                            <th>Status</th>
                            <th>Currency</th>
                            <th>Date_created</th>
                            <th>Billing Name</th>
                            <th>Shipping Name</th>
                            <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th>ID</th>
                            <th>Orders Number</th>
                            <th>Status</th>
                            <th>Currency</th>
                            <th>Date_created</th>
                            <th>Billing Name</th>
                            <th>Shipping Name</th>
                            <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody class="text-center" >
                            @foreach($orders as $order)
                            <tr>
                                <td >{{ $order->id }}<br></td>
                            <td > {{$order->number}}<br></td>
                            <td>{{ $order->status }}</td>
                            <td > {{ $order->currency }}</td>
                            <td >{{ $order->date_created }}</td>
                            <td>{{ $order->billing->first_name }} {{ $order->billing->last_name }}</td>
                            <td>{{ $order->shipping->first_name }} {{ $order->shipping->last_name }}</td>
                            <td ><a class="btn btn-primary" href="{{url('orders/edit',$order->id)}}">Edit</a></td>
                            </tr>
                            
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection


        