<?php

namespace App\Http\Controllers\User;

// import controller
use App\Http\Controllers\Controller;

// import model
use App\Models\MstUser;

class GetUser extends Controller
{
    function getUser()
    {
        // get all data
        $userAll = MstUser::all(); 

        // validate data from tabel mst_user
        if (!$userAll) {
            return response()->json([
                'message' => "user not found",
                'code' => 404,
                'data' => array()
            ], 404);
        }
        // variable to find by id

        // condition success
        return response()->json([
            'message' => "Success get all data for user",
            'code' => 200,
            'data' => $userAll
        ], 200);
    }
}
