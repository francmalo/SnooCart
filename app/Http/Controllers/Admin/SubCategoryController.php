<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Import the Hash facade
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Support\Facades\Auth; // Add this line


class SubCategoryController extends Controller
{
    public function list(){
        $data['getRecord']=SubCategory::getRecord();
        $data['header_title']='Sub Category';
        return view('admin.subcategory.list',$data);
    }
    public function add(){
        $data['getCategory']=Category::getRecord();
        $data['header_title']='Add New Sub Category';
        return view('admin.subcategory.add',$data);
    } public function insert(Request $request)
    {

        request()->validate([
            'slug'=>'required|unique:subcategory'
        ]);
       $subcategory=new SubCategory;
       $subcategory->category_id= trim($request->category_id);
       $subcategory->name= trim($request->name);
       $subcategory->slug= trim($request->slug);
       $subcategory->status= trim($request->status);
       $subcategory->meta_title= trim($request->meta_title);
       $subcategory->meta_description= trim($request->meta_description);
       $subcategory->meta_keywords= trim($request->meta_keywords);
       $subcategory->created_by= Auth::user()->id;
       $subcategory->save();

      
       return redirect()->route('subcategory.list')->with('success',"SubCategory Successfully Created");
    }
   
        public function edit($id)
    {
        $data['getCategory']=Category::getRecord(); 
        $subcategory = SubCategory::findOrFail($id);
        return view('admin.subcategory.edit', compact('subcategory', 'data'));
    }
    
    public function update(Request $request,$id)
    {
        request()->validate([
            'slug' => 'required|unique:subcategory,slug,' . $id,
          ]);

        $subcategory=SubCategory::findOrFail($id);

        if (!$subcategory){
            return redirect()->route('subcategory.list')->with('error',"No sub category exists for this ID");
        }

        $subcategory->update([
            'category_id' => trim($request->category_id),
            'name' => trim($request->name),
            'slug' => trim($request->slug),
            'status' => ($request->status == '1') ? 1 : 0,
            'meta_title' => trim($request->meta_title),
            'meta_description' => trim($request->meta_description),
            'meta_keywords' => trim($request->meta_keywords),

        ]);


       return redirect()->route('subcategory.list')->with('success',"SubCategory Successfully Updated");
    }
    public function delete($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->delete();
    
        
        return redirect()->route('subcategory.list')->with('success',"SubCategory Successfully Deleted");
    }
}
