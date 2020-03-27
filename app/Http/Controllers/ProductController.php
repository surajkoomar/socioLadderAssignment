<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Redirect;
use Illuminate\Support\Facades\Validator;   

class ProductController extends Controller
{
    public function addProduct(){
        return view('products.product_add');
    } 
    
    public function saveProduct(Request $request){
        
         $validator = Validator::make($request->all(), [
            'image' => 'dimensions:min_width=200,min_height=200'
        ]);
        if ($validator->fails()) {
            
            return Redirect::back()->withErrors($validator);

        }else{

        $file = $request->file('image');
        $finalFilePath = '';
            if($file){
                $destinationPath = public_path('product');
                $originalFile = $file->getClientOriginalName();
                $filename=strtotime(date('Y-m-d-H:isa')).$originalFile;
                $finalFilePath = $filename;
                $file->move($destinationPath, $filename);
            }
        $productName = $request->product_name;
        $price = $request->price;
        $discountPercentage = $request->discount_percentage;
        $description = $request->description;

        Product::Create([
            "image_path" => $finalFilePath,
            "product_name" => $productName,
            "price" => $price,
            "discount_percentage" => $discountPercentage,
            "description" => $description,
            ]); 

        return Redirect::route('product_list')->with(['msg'=>'Product added successfully']);      
       }
    }
    public function showProduct($id){
        $productInfo = Product::find($id);
        return view('products.product_show',compact('productInfo'));
    }

    public function updateProduct(Request $request,$id){
          $validator = Validator::make($request->all(), [
            'image' => 'dimensions:min_width=200,min_height=200'
        ]);
        if ($validator->fails()) {
            
            return Redirect::back()->withErrors($validator);

        }else{
        $file = $request->file('image');
        $updateProductArray = [];
            if($file){
                $destinationPath = public_path('blog');
                $originalFile = $file->getClientOriginalName();
                $filename=strtotime(date('Y-m-d-H:isa')).$originalFile;
                $finalFilePath = $filename;
                $file->move($destinationPath, $filename);
                $updateProductArray['image_path'] = $finalFilePath;
            }

        $productName = $request->product_name;
        $price = $request->price;
        $discountPercentage = $request->discount_percentage;

        $updateBlogArray['product_name'] = $productName;
        $updateBlogArray['price'] = $price;
        $updateBlogArray['discount_percentage'] = $discountPercentage;
        $updateBlogArray['description'] = $request->description;

        Product::where('id',$id)->update($updateBlogArray);    

        return Redirect::route('product_list')->with(['msg'=>'Product updated successfully']);        
        }
    }

    public function deleteProduct($id){
        $product = Product::find($id);
        $product->delete();
        return Redirect::route('product_list')->with(['msg'=>'Product deleted successfully']);        
    }
}
