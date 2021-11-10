<?php 
// namespace contollers
namespace App\Http\Controllers\Catering;
use App\Http\Controllers\Controller;

// import validator
use Illuminate\Support\Facades\Validator;

// Import http
use Illuminate\Http\Request;

// import model
use App\Models\Catering;
use App\Models\CateringDetail;
use App\Models\CateringType;

class AddCatering extends Controller {
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
    public function createCatering(Request $requset) {
        
        // membuat validasi
        $validator = Validator::make($requset->all(),[
            'catering_name' => 'required',
            'user_id' => 'required',
            'type_id' => 'required',
        ],[
            'catering_name.required' => 'please fill catering name',
            'user_id.required' => 'please fill user id',
            'type_id.required' => 'please fill type id',
        ]);

        if ($validator->fails()) {
            return $this->consistenReturn($validator->errors(),500,"");
        }
  
        // validation user id
        $isValidUser = Catering::find($requset->user_id);
        if (!$isValidUser) {
            return $this->consistenReturn("User not found",404,"");
        }
  
        // validation catering type
        $isvalidType = CateringType::find($requset->type_id);
        if (!$isvalidType) {
            return $this->consistenReturn("catering type not found",404,"");
        }
        
        $datas = Catering::create([
            'catering_name' => $requset->catering_name,
            'user_id' => $requset->user_id,
            'type_id' => $requset->type_id
        ]);
        
        $arrData = [];
        array_push($arrData,array(
            "id" => $datas->id,
            "created_at" =>time(),
            "created_by" => $requset->user_id
        ));
        return $this->consistenReturn("Success add catering",201,$arrData);

    }
}
?>