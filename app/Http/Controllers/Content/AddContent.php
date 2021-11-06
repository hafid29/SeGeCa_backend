<?php 
namespace App\Http\Controllers\Content;
use App\Http\Controllers\Controller;

use Illuminate\Database\Eloquent\Model;

// model content
use App\Models\MstContent;
// model user
use App\Models\MstUser;
use App\Models\Building;

// import validator
use Illuminate\Support\Facades\Validator;
// Import http
use Illuminate\Http\Request;
use Exception;

class AddContent extends Controller {
    public function index(Request $request) {
        
        $validator = Validator::make($request->all(),[
            'product_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'modified_by' => 'required',
        ],[
            'product_id.required' => 'Please fill product_id',
            'title.required' => 'Please fill title',
            'description.required' => 'Please fill description',
            'modified_by.required' => 'Please fill modified by'
        ]);

        if (!$validator->fails()) {
            return response()->json([
                'message' => $validator->errors(),
                'code' => 500,
                'data' => array()
            ],500);
        };
        
        try {
            // validation user id
            $isValidUser = MstUser::find($request->modified_by);    
            if (!$isValidUser) {
                return response()->json([
                    'message' => "User id not registered, please use valid user id",
                    'code' => 404,
                    'data' => array()
                ],404);
            }

            // validation product id
            $isValidBuilding = Building::find($request->product_id);
            if (!$isValidBuilding) {
                return response()->json([
                    'message' => "Building not registered, please use valid building id",
                    'code' => 404,
                    'data' => array()
                ],404);
            }
            
            // insert content
            $content = MstContent::create([
                'product_id' => $request->product_id,
                'modified_by' => $request->modified_by,
                'title' => $request->title,
                'description' => $request->description
            ]);
            // TODO: Add response
            var_dump($content);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed add content',
                'code' => 500,
                'error_code' => $e->getCode(),
                'data' => array(),
            ],500);
        }
    }
}