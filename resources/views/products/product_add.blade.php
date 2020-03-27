@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                     @if(count($errors) > 0)
                        <div>
                            <ul>
                                @foreach($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </ul>
                        </div>
                     @endif
            </div>
            <div class="card">
                <div class="card-header">Add Products</div>
                 <div class="card-body">
                    <form name="add-blog" id="add-blog" enctype='multipart/form-data' method="POST" action="{{url('save_product')}}">
                    <div class="form-group row">
                        <label for="Image" class="col-md-4 col-form-label text-md-right">Image</label>
                        <div class="col-md-6">
                            <input id="image" type="file" name="image" value="" required="required" autofocus="autofocus" class="form-control" accept="image/*">
                            image must be 200*200
                        </div>
                    </div>

                    @if ($errors->has('image'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                    @endif 
                    @csrf
                    
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Product Name</label>
                        <div class="col-md-6">
                            <input id="product_name" type="text" name="product_name" value="" required="required" autofocus="autofocus" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Price</label>
                        <div class="col-md-6">
                            <input id="price" type="text" name="price" value="" required="required" autofocus="autofocus" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Discount Percentage</label>
                        <div class="col-md-6">
                            <input id="discount_percentage" type="text" name="discount_percentage" value="" required="required" autofocus="autofocus" class="form-control">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Description</label>
                        <div class="col-md-6">
                            <!-- <input id="name" type="text" name="name" value="" required="required" autofocus="autofocus" class="form-control"> -->
                            <textarea id="description" type="text" name="description" value="" required="required" autofocus="autofocus" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                                    Submit
                        </button>
                    </div> 
                    </form> 
                 </div>
             </div>
         </div>
    </div>
</div>
@endsection

