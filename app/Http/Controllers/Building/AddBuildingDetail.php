<?php
// namespace contollers
namespace App\Http\Controllers\Building;

use App\Http\Controllers\Controller;

// import validator
use Illuminate\Support\Facades\Validator;

// Import http
use Illuminate\Http\Request;

// import model
use App\Models\BuildingDetail;

class AddBuildingDetail extends Controller
{
    public function addBuildingDetail(Request $request)
    {
        // membuat validasi
        $validator = Validator::make(
            $request->all(),
            [
                'building_address' => 'required',
                'capacity' => 'required'
            ],
            [
                'building_address' => 'please fill address',
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
        $data = BuildingDetail::create([
            'building_address' => $request->building_address,
            'capacity' => $request->capacity
        ]);
        if ($data) {
            return response()->json([
                'message' => "Success insert building detail",
                'code' => 201,
                'data' => array()
            ], 201);
        } else {
            return response()->json([
                'message' => "Failed to add building detail",
                'code' => 500,
                'data' => array(),
            ], 500);
        }
    }
}
