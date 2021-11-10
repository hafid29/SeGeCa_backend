<?php 
// namespace for controllers
namespace App\Http\Controllers\Catering;
use App\Http\Controllers\Controller;
// request validator
use Illuminate\Support\Facades\Validator;
// Import http
use Illuminate\Http\Request;
// import models
use App\Models\CateringType;

class GetCateringTypeById extends Controller {
    public function getCateringTypeById() {

        // parse catering type id from url param
        $id = request()->route('id');
        
        // find data by id
        $datas = CateringType::find($id);
        // validate data from database
        if (!$datas) {
            return response()->json([
                'message' => "catering type with id ".$id." not found",
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
            'message' => "Success get detail for catering type",
            'code' => 200,
            'data' => $arrTypes,
        ],200);
    }
}

?>