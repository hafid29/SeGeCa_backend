<?php 
// namespace contollers
namespace App\Http\Controllers\Catering;
use App\Http\Controllers\Controller;
// request validator
use Illuminate\Support\Facades\Validator;
// Import http
use Illuminate\Http\Request;
// import models
use App\Models\CateringType;

class AddcateringType extends Controller {
    public function addcateringType(Request $request) {
        
        // check request validation
        $validator = Validator::make($request->all(),[
            'type_name' => 'required',
        ],[
            'type_name.required' => 'Please fill type_name',
        ]);
        
        // check validator 
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors(),
                'code'=> 500,
                'data'=> array()
            ],500);
        }

        $data = CateringType::create([
            'type_name' => $request->type_name,
        ]);
        if ($data) {
            return response()->json([
                'message' => "Success insert catering type",
                'code'=> 201,
                'data'=> array()
            ],201);
        }else{
            return response()->json([
                'message' => "Failed to add catering type",
                'code'=> 500,
                'data'=> array(),
            ],500);
        }
        
    }
}
?>