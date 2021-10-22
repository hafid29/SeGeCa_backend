<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstUserData extends Model
{
    // Deifine table name
    protected $table = 'mst_user_data';
    
    // define database engine
    protected $connection = 'mysql';

    // define primary_key
    protected $primaryKey = 'id';

    // define field from table
    protected $fillable = ['no_telp','photo_profile','first_name','last_name','user_id'];
    
    // not active timestamp
    public $timestamps = false;
    use HasFactory;
}
