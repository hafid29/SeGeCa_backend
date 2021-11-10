<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CateringType extends Model
{
    // Deifine table name
    protected $table = 'mst_catering_type';
    
    // define database engine
    protected $connection = 'mysql';

    // define primary_key
    protected $primaryKey = 'id';

    // define field from table
    protected $fillable = ['type_name'];
    
    // not active timestamp
    public $timestamps = false;
    use HasFactory;
}
