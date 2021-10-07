<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstUser extends Model
{
    // Deifine table name
    protected $table = 'mst_user';
    
    // define database engine
    protected $connection = 'mysql';

    // define primary_key
    protected $primaryKey = 'id';

    // define field from table
    protected $fillable = ['username','password','id_user_role'];

    // not active timestamp
    public $timestamps = false;

    use HasFactory;
}
