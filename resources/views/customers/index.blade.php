@extends('layouts.app')

@section('content')
     

    <div class="container-fluid">
        <h1 class="mt-4">List of Customers</h1>
        
        <div class="card mb-4">
            <div class="card-header">


                <a class= "btn btn-primary" href="{{url('/customers/create')}}">Add New Customer</a>
                <a class= "btn btn-success" href = "{{url('/customers/excel')}}">Export</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Billing Phone</th>
                            <th>Billing Country</th>
                            <th>Billing City</th>
                            <th>Billing Address</th>
                            <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Billing Phone</th>
                            <th>Billing Country</th>
                            <th>Billing City</th>
                            <th>Billing Address</th>
                            <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody class="text-center" >
                            @foreach($customers as $customer)
                            <tr>
                            <td >{{ $customer->id }}<br></td>
                            <td > {{$customer->email}}<br></td>
                            <td>{{ $customer->last_name }}</td>
                            <td>{{ $customer->first_name }}</td>
                            <td>{{ $customer->billing->phone }}</td>
                            <td >{{ $customer->billing->country }}</td>
                            <td >{{ $customer->billing->city }}</td>
                            <td>{{ $customer->billing->address_1}}</td>
                            <td >
                            
                            <form class="form inline" method="post" action = "{{url('/customers/delete')}}">
                            
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a class= "btn btn-primary" href="{{url('customers/edit',$customer->id)}}">Edit</a> | 
                            <button class= "btn btn-danger" name="id" value="{{ $customer->id }}">Delete</button>
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

        