<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CateringDetail extends Model
{
    // Deifine table name
    protected $table = 'mst_catering_detail';
    
    // define database engine
    protected $connection = 'mysql';

    // define primary_key
    protected $primaryKey = 'id';

    // define field from table
    protected $fillable = ['catering_address','capacity'];

    // not active timestamp
    public $timestamps = false;
    use HasFactory;
}
