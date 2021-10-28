<?php 
// namespace contollers
namespace App\Http\Controllers\Building;
use App\Http\Controllers\Controller;

// Import http
use Illuminate\Http\Request;

class GetBuildings extends Controller {
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