<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Import the Hash facade
use App\Models\Category;
use Illuminate\Support\Facades\Auth; // Add this line

class CategoryController extends Controller
{

    public function list(){
        $data['getRecord']=Category::getRecord();
        $data['header_title']='Category';
        return view('admin.category.list',$data);
    }
    public function add(){

        $data['header_title']='Add New Category';
        return view('admin.category.add',$data);
    }
    public function insert(Request $request)
    {

        request()->validate([
            'slug'=>'required|unique:category'
        ]);
       $category=new Category;
       $category->name= trim($request->name);
       $category->slug= trim($request->slug);
       $category->status= trim($request->status);
       $category->meta_title= trim($request->meta_title);
       $category->meta_description= trim($request->meta_description);
       $category->meta_keywords= trim($request->meta_keywords);
       $category->created_by= Auth::user()->id;
       $category->save();

       return redirect('admin/category/list')->with('success',"Category Successfully Created");
    }
    public function edit($id){
        $category=Category::findOrFail($id);
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request,$id)
    {
        request()->validate([
            'slug'=>'required|unique:category,slug,'.$id
        ]);

        $category=Category::findOrFail($id);

        if (!$category){
            return redirect()->route('category.list')->with('error',"No category exists for this ID");
        }

        $category->update([
            'name' => trim($request->name),
            'slug' => trim($request->slug),
            'status' => ($request->status == '1') ? 1 : 0,
            'meta_title' => trim($request->meta_title),
            'meta_description' => trim($request->meta_description),
            'meta_keywords' => trim($request->meta_keywords),

        ]);






       return redirect()->route('category.list')->with('success',"Category Successfully Updated");
    }
    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
    
        return redirect('admin/category/list')->with('success', "SubCategory Successfully Deleted");
    }
}
