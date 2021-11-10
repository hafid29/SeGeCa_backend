<?php 
// namespace for controllers
namespace App\Http\Controllers\Building;
use App\Http\Controllers\Controller;
// request validator
use Illuminate\Support\Facades\Validator;
// Import http
use Illuminate\Http\Request;
// import models
use App\Models\OrderStatus;

class GetBuildingTypeById extends Controller {
    public function getStatusTypeById() {

        // parse building type id from url param
        $id = request()->route('id');
        
        // find data by id
        $datas = OrderStatus::find($id);
        // validate data from database
        if (!$datas) {
            return response()->json([
                'message' => "Building type with id ".$id." not found",
                'code' => 404,
                'data' => array()
            ],404);
        }
        
        // dump array
        $arrTypes = [];
        array_push($arrTypes,array(
            'id' => $datas['id'],
            'status' => $datas['status']
        ));
        
        // validate requst param
        return response()->json([
            'message' => "Success get detail for status",
            'code' => 200,
            'data' => $arrTypes,
        ],200);
    }
}

?>