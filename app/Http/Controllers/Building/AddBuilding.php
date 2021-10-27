<?php 
// namespace contollers
namespace App\Http\Controllers\Building;
use App\Http\Controllers\Controller;

// import validator
use Illuminate\Support\Facades\Validator;

// Import http
use Illuminate\Http\Request;

class AddBuilding extends Controller {
    public function createBuilding(Request $requset) {
        // membuat validasi
        $validator = Validator::make($requset->all(),[
            'building_name' => 'required'
        ],[
            'building_name.required' => 'please fill building name'
        ]);

        if ($validator->fails()) {
            return response()->json([
               'message' => 'empty field', 
               'code' => 500,
               'data' => $validator->errors() 
            ],500);
        }
        return response()->json([
            'message' => 'success',
            'code' => 201,
            'data' => array()
        ],201);

    }
}
?>