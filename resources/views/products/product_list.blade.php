@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="">
                <!-- <div class="card-header">Dashboard</div> -->

                <div class="card-body">
                    @if (session('msg'))
                        <div class="alert alert-success" role="alert">
                            {{ session('msg') }}
                        </div>
                    @endif
				</div>
                @if(Auth::User()->user_type=='admin')
                <a class="navbar-brand" href="{{ url('/add_product') }}">
                    Add Product
                </a>
                @endif
				<table class="table">
                 	<tr>
                 		<th>Sr. No.</th>
                 		<th>Image</th>
                 		<th>Name</th>
                 		<th>Price</th>
                        <th>Discount Percentage</th>
                        <th>Description</th>
                        @if(Auth::User()->user_type=='admin')
                            <th>Action</th>
                        @endif    
                 	</tr>
                    @if($productList->count() > 0)
                        @foreach($productList as $key=>$product)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td><img src="{{url('product').'/'.$product->image_path}}" width="" height="12%"/></td>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->price}}</td>  
                                <td>{{$product->discount_percentage}}</td>      
                                <td>{{$product->description}}</td>
                                @if(Auth::User()->user_type=='admin')
                                <td><a href="{{url('/show_product/'.$product->id)}}">Edit</a> / <a href="{{url('/delete_product/'.$product->id)}}">Delete</a></td>
                                @endif  
                            </tr>    
                        @endforeach
                    @endif	
                 </table>
            </div>
            {{ $productList->links() }}

        </div>

    </div>
</div>

@endsection
