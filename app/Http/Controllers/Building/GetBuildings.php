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
            'success' => true
        ];
        return response()->json($response,200);
    }

}

?>