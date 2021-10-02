<?php 
// namespace for controllers
namespace App\Http\Controllers\Building;
use App\Http\Controllers\Controller;
// request validator
use Illuminate\Support\Facades\Validator;
// Import http
use Illuminate\Http\Request;
// import models
use App\Models\BuildingType;

class GetBuildingTypeById extends Controller {
    public function getBuildingTypeById() {

        // parse building type id from url param
        $id = request()->route('id');
        
        // find data by id
        $datas = BuildingType::find($id);
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
            'type_name' => $datas['type_name']
        ));
        
        // validate requst param
        return response()->json([
            'message' => "Success get detail for building type",
            'code' => 200,
            'data' => $arrTypes,
        ],200);
    }
}

?>