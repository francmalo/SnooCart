<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
  
    use HasFactory;
    protected $table = 'subcategory';

    protected $fillable = [
        'category_id','name','slug','status','meta_title','meta_description','meta_keywords','created_by'
    ];

    static public function getRecord(){
        return self::select('subcategory.*','users.name as created_by_name','category.name 
                        as category_name')
                    ->join('category','category.id','=','subcategory.category_id')
                    ->join('users','users.id','=','subcategory.created_by')
                    ->orderBy('subcategory.id','desc')
                    ->paginate(20);
    }
}
