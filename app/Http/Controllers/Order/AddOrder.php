<?php 
// namespace contollers
namespace App\Http\Controllers\Order;
use App\Http\Controllers\Controller;

// import validator
use Illuminate\Support\Facades\Validator;

// Import http
use Illuminate\Http\Request;

// import model
use App\Models\Order;
use App\Models\OrderStatus;

class AddOrder extends Controller {
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
    public function createOrder(Request $requset) {
        
        // membuat validasi
        $validator = Validator::make($requset->all(),[
            'id_order_status' => 'required',
            'user_id' => 'required',
            'id_build' => 'required',
            'id_catering' => 'required'
        ],[
            'id_order_status.required' => 'please fill order name',
            'user_id.required' => 'please fill order name',
            'id_build.required' => 'please fill order name',
            'id_catering.required' => 'please fill order name'
        ]);

        if ($validator->fails()) {
            return $this->consistenReturn($validator->errors(),500,"");
        }
  
        // validation user id
        $isValidUser = Order::find($requset->user_id);
        if (!$isValidUser) {
            return $this->consistenReturn("User not found",404,"");
        }
  
        // validation order type
        $isvalidType = OrderStatus::find($requset->type_id);
        if (!$isvalidType) {
            return $this->consistenReturn("order type not found",404,"");
        }
        
        $datas = Order::create([
            'id_order_status' => $requset->id_order_status,
            'user_id' => $requset->user_id,
            'id_build' => $requset->id_build,
            'id_catering' => $requset->id_catering
        ]);
        
        $arrData = [];
        array_push($arrData,array(
            "id" => $datas->id,
            "created_at" =>time(),
            "created_by" => $requset->user_id
        ));
        return $this->consistenReturn("Success add order",201,$arrData);

    }
}
?>