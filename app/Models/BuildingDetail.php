<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildingDetail extends Model
{
    // Deifine table name
    protected $table = 'mst_building_detail';
    
    // define database engine
    protected $connection = 'mysql';

    // define primary_key
    protected $primaryKey = 'id';

    // define field from table
    protected $fillable = ['building_address','capacity'];

    // not active timestamp
    public $timestamps = false;
    use HasFactory;
}
