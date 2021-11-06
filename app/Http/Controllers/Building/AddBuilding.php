<?php 
// namespace contollers
namespace App\Http\Controllers\Building;
use App\Http\Controllers\Controller;

// import validator
use Illuminate\Support\Facades\Validator;

// Import http
use Illuminate\Http\Request;

// import model
use App\Models\MstUser;
use App\Models\BuildingType;
use App\Models\Building;

class AddBuilding extends Controller {
    function consistenReturn($msg,$code,$data) {
        if ($data == "") {
            return response()->json([
                'message' => $msg, 
                'code' => $code,
                'data' => array() 
            ],$code);    
        }
        return response()->json([
            'message' => $msg, 
            'code' => $code,
            'data' => $data
         ],$code);
    }
    public function createBuilding(Request $requset) {
        
        // membuat validasi
        $validator = Validator::make($requset->all(),[
            'building_name' => 'required',
            'user_id' => 'required',
            'type_id' => 'required',
        ],[
            'building_name.required' => 'please fill building name',
            'user_id.required' => 'please fill user id',
            'type_id.required' => 'please fill type id',
        ]);

        if ($validator->fails()) {
            return $this->consistenReturn($validator->errors(),500,"");
        }
  
        // validation user id
        $isValidUser = MstUser::find($requset->user_id);
        if (!$isValidUser) {
            return $this->consistenReturn("User not found",404,"");
        }
  
        // validation building type
        $isvalidType = BuildingType::find($requset->type_id);
        if (!$isvalidType) {
            return $this->consistenReturn("Building type not found",404,"");
        }
        
        $datas = Building::create([
            'building_name' => $requset->building_name,
            'user_id' => $requset->user_id,
            'type_id' => $requset->type_id
        ]);
        
        $arrData = [];
        array_push($arrData,array(
            "id" => $datas->id,
            "created_at" =>time(),
            "created_by" => $requset->user_id
        ));
        return $this->consistenReturn("Success add building",201,$arrData);

    }
}
?>