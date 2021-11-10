<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    // Deifine table name
    protected $table = 'mst_order';
    
    // define database engine
    protected $connection = 'mysql';

    // define primary_key
    protected $primaryKey = 'id';

    // define field from table
    protected $fillable = ['id_order_status','user_id','id_build','id_catering','created_at','updated_at'];
    
    // not active timestamp
    public $timestamps = false;
    use HasFactory;
}
