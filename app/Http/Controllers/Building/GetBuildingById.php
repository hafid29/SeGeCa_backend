<?php 
// namespace contollers
namespace App\Http\Controllers\Building;
use App\Http\Controllers\Controller;

// Import http
use Illuminate\Http\Request;

class GetBuildingById extends Controller {
    public function getBuildingById() {
        $id = request()->route('id');
        return response()->json($id,200);
    }
}
?>