@extends('layouts.app')

@section('content')
     

    <div class="container-fluid">
        <h1 class="mt-4">List of Products</h1>
        
        <div class="card mb-4">
            <div class="card-header">
                <a class= "btn btn-primary" href="{{url('/products/create')}}">Add New Product</a>
                <a class= "btn btn-success" href = "{{url('/products/excel')}}">Export</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Product</th>
                            <th>Slug</th>
                            <th>Type</th>
                            <th>Categorie</th>
                            <th>Price</th>
                            <th>Sales</th>
                            <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th>ID</th>
                            <th>Product</th>
                            <th>Slug</th>
                            <th>Type</th>
                            <th>Categorie</th>
                            <th>Price</th>
                            <th>Sales</th>
                            <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody class="text-center" >
                            @foreach($products as $product)
                            <tr>
                                <td >{{ $product->id }}<br></td>
                            <td ><img class="rounded-circle mr-2" width="30" height="30" src="{{ $product->images[0]->src }}"> {{$product->name}}<br></td>
                            <td>{{ $product->slug }}</td>
                            <td>{{ $product->type }}</td>
                            <td >{{ $product->categories[0]->name }}</td>
                            <td >{{ $product->price }} $</td>
                            <td>{{ $product->total_sales }}</td>
                            <td >
                            <form class="form inline" method="post" action = "{{url('/products/delete')}}">
                            
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a class= "btn btn-primary" href="{{url('products/edit',$product->id)}}">Edit</a> | 
                            <button class= "btn btn-danger" name="id" value="{{ $product->id }}">Delete</button>
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

        