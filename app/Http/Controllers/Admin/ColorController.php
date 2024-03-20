<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Import the Hash facade
use App\Models\Color;
use Illuminate\Support\Facades\Auth;
class ColorController extends Controller
{

    public function list(){
        $data['getRecord']=Color::getRecord();
        $data['header_title']='Color';
        return view('admin.color.list',$data);
    }

    public function add(){
        $data['getColor']=Color::getRecord();
        $data['header_title']='Add New Color';
        return view('admin.color.add',$data);
    }
    public function insert(Request $request)
    {

       $color=new Color;
       $color->name= trim($request->name);
       $color->code= trim($request->code);
       $color->status= trim($request->status);
       $color->created_by= Auth::user()->id;
       $color->save();


       return redirect()->route('color.list')->with('success',"Color Successfully Created");
    }

        public function edit($id)
    {
        $color = Color::findOrFail($id);
        return view('admin.color.edit', compact('color'));
    }

    public function update(Request $request,$id)
    {
        $color=Color::findOrFail($id);

        if (!$color){
            return redirect()->route('color.list')->with('error',"No Color exists for this ID");
        }

        $color->update([
            'name' => trim($request->name),
            'code' => trim($request->code),
            'status' => ($request->status == '1') ? 1 : 0,


        ]);






       return redirect()->route('color.list')->with('success',"Category Successfully Updated");
    }
    public function delete($id)
    {
        $color = Color::findOrFail($id);
        $color->delete();


        return redirect()->route('color.list')->with('success',"Color Successfully Deleted");
    }



}
