<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstContent extends Model
{
     // Deifine table name
     protected $table = 'mst_content';
    
     // define database engine
     protected $connection = 'mysql';
 
     // define primary_key
     protected $primaryKey = 'id';
 
     // define field from table
     protected $fillable = ['product_id','product_id','title','description','created_at','updated_at','created_by','modified_by'];
     
     // not active timestamp
     public $timestamps = false;
    use HasFactory;
}
