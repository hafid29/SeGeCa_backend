<?php
// namespace contollers
namespace App\Http\Controllers\Catering;

use App\Http\Controllers\Controller;

// import validator
use Illuminate\Support\Facades\Validator;

// Import http
use Illuminate\Http\Request;

// import model
use App\Models\CateringDetail;

class AddCateringDetail extends Controller
{
    public function addcateringDetail(Request $request)
    {
        // membuat validasi
        $validator = Validator::make(
            $request->all(),
            [
                'catering_address' => 'required',
                'capacity' => 'required'
            ],
            [
                'catering_address' => 'please fill address',
                'capacity' => 'please fill address'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors(),
                'code' => 500,
                'data' => array()
            ], 500);
        }
        $data = CateringDetail::create([
            'catering_address' => $request->catering_address,
            'capacity' => $request->capacity
        ]);
        if ($data) {
            return response()->json([
                'message' => "Success insert catering detail",
                'code' => 201,
                'data' => array()
            ], 201);
        } else {
            return response()->json([
                'message' => "Failed to add catering detail",
                'code' => 500,
                'data' => array(),
            ], 500);
        }
    }
}
