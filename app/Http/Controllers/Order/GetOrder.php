<?php 
// namespace contollers
namespace App\Http\Controllers\Order;
use App\Http\Controllers\Controller;

// Import http
use Illuminate\Http\Request;

class GetOrder extends Controller {
     // get list building
     public function index() {
        $response = [
            'success' => true,
            'code' => 200,
            'data' => array()
        ];
        return response()->json($response,200);
    }

}

?>