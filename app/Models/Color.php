<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $table='color';

    protected $fillable = [
        'name','code','status','created_by'
    ];
    static public function getRecord(){
        return self::select('color.*','users.name as created_by_name')
                    ->join('users','users.id','=','color.created_by')
                    ->orderBy('color.id','desc')
                    ->get();
    }
}
