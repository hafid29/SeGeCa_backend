<?php 
// namespace contollers
namespace App\Http\Controllers\Catering;
use App\Http\Controllers\Controller;

// Import http
use Illuminate\Http\Request;

class GetCateringById extends Controller {
    public function getCateringById() {
        $id = request()->route('id');
        return response()->json($id,200);
    }
}
?>