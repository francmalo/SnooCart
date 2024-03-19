<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Import the Hash facade
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class ProductController extends Controller
{
   
    public function list(){
        $data['getRecord']=Product::getRecord();
        $data['header_title']='Product';
        return view('admin.product.list',$data);
    }

    public function add(){
        $data['header_title']='Add New Product';
        return view('admin.product.add',$data);
    } 
    public function insert(Request $request)
    {

       $title=trim($request->title);
       $product=new Product;
       $product->title= $title;
       $product->created_by= Auth::user()->id;
       $product->save();

       $slug=Str::slug($title,"-");
       $checkSlug=Product::checkSlug($slug);
       if(empty($checkSlug))
       {
        $product->slug = $slug;
       }
       else
       {
        $new_slug=$slug.'-'.$product->id;
        $product->slug = $new_slug;
       
       }
       $product->save();
    
      
       return redirect()->route('product.list')->with('success',"product Successfully Created");
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('product'));
    }
}
