<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Import the Hash facade
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth; // Add this line


class SubCategoryController extends Controller
{
    public function list(){
        // $data['getRecord']=SubCategory::getRecord();
        $data['header_title']='Sub Category';
        return view('admin.subcategory.list',$data);
    }
}
