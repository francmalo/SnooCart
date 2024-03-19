<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Import the Hash facade
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;



class BrandController extends Controller
{
    public function list(){
        $data['getRecord']=Brand::getRecord();
        $data['header_title']='Brand';
        return view('admin.brand.list',$data);
    }

    public function add(){
        $data['getBrand']=Brand::getRecord();
        $data['header_title']='Add New Brand';
        return view('admin.brand.add',$data);
    } 
    public function insert(Request $request)
    {

        request()->validate([
            'slug'=>'required|unique:subcategory'
        ]);
       $brand=new Brand;
       $brand->name= trim($request->name);
       $brand->slug= trim($request->slug);
       $brand->status= trim($request->status);
       $brand->meta_title= trim($request->meta_title);
       $brand->meta_description= trim($request->meta_description);
       $brand->meta_keywords= trim($request->meta_keywords);
       $brand->created_by= Auth::user()->id;
       $brand->save();

      
       return redirect()->route('brand.list')->with('success',"Brand Successfully Created");
    }
   
        public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
    }
    
    public function update(Request $request,$id)
    {
        request()->validate([
            'slug'=>'required|unique:category,slug,'.$id
        ]);

        $brand=Brand::findOrFail($id);

        if (!$brand){
            return redirect()->route('brand.list')->with('error',"No brand exists for this ID");
        }

        $brand->update([
            'name' => trim($request->name),
            'slug' => trim($request->slug),
            'status' => ($request->status == '1') ? 1 : 0,
            'meta_title' => trim($request->meta_title),
            'meta_description' => trim($request->meta_description),
            'meta_keywords' => trim($request->meta_keywords),

        ]);






       return redirect()->route('brand.list')->with('success',"Category Successfully Updated");
    }
    public function delete($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
    
        
        return redirect()->route('brand.list')->with('success',"Brand Successfully Deleted");
    }



}
