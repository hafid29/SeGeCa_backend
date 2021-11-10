<?php
// namespace contollers
namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;

// import validator
use Illuminate\Support\Facades\Validator;

// Import http
use Illuminate\Http\Request;

// import model
use App\Models\OrderStatus;

class AddOrderStatus extends Controller
{
    public function addOrderStatus(Request $request)
    {
        // membuat validasi
        $validator = Validator::make(
            $request->all(),
            [
                'status' => 'required',
                'capacity' => 'required'
            ],
            [
                'status' => 'please fill status',
                'capacity' => 'please fill status'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors(),
                'code' => 500,
                'data' => array()
            ], 500);
        }
        $data = OrderStatus::create([
            'status' => $request->status,
            'capacity' => $request->capacity
        ]);
        if ($data) {
            return response()->json([
                'message' => "Success insert status",
                'code' => 201,
                'data' => array()
            ], 201);
        } else {
            return response()->json([
                'message' => "Failed to add status",
                'code' => 500,
                'data' => array(),
            ], 500);
        }
    }
}
