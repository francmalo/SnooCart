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

        $data['header_title']='Add New Admin';
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
        $data['getRecord']=Category::getSingle($id);
        $data['header_title']='Edit Category';
        return view('admin.category.edit',$data);
    }

    public function update($id,Request $request)
    {
        request()->validate([
            'slug'=>'required|unique:category,slug,'.$id
        ]);

        // $category=Category::findOrFail($id);
        $category=Category::getSingle($id);
        $category->name= trim($request->name);
        $category->slug= trim($request->slug);
        $category->status = ($request->status == '1') ? 1 : 0;
        $category->meta_title= trim($request->meta_title);
        $category->meta_description= trim($request->meta_description);
        $category->meta_keywords= trim($request->meta_keywords);
        $category->save();




       return redirect('admin/category/list')->with('success',"Category Successfully Updated");
    }
    public function delete($id){
        $category=Category::getSingle($id);
        // $user->is_delete=1;
        $category->delete();

        return redirect('admin/admin/list')->with('success',"Category Successfully Deleted");
    }
}
