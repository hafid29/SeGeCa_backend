<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{

    // Deifine table name
    protected $table = 'mst_building';
    
    // define database engine
    protected $connection = 'mysql';

    // define primary_key
    protected $primaryKey = 'id';

    // define field from table
    protected $fillable = ['building_name','user_id','type_id','is_active'];
    
    // not active timestamp
    public $timestamps = false;
    use HasFactory;
}
