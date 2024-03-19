<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'title','slug','category_id','subcategory_id','brand_id','old_price','price','slug','short_description','description','additional_information','shipping_returns','status','created_by'
    ];
   static public function checkSlug($slug)
   {
    return self::where('slug','=',$slug)->count();
   }
}
