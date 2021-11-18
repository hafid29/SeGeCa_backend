<?php

namespace App\Http\Controllers\User;

// import controller
use App\Http\Controllers\Controller;

// import model
use App\Models\MstUser;

class GetUserById extends Controller
{
    function getUserById($id)
    {
        // find data by id
        $user =  MstUser::find($id);
        // validate data from tabel mst_user
        if (!$user) {
            return response()->json([
                'message' => "user with id " . $id . " not found",
                'code' => 404,
                'data' => array()
            ], 404);
        }
        // variable to find by id
        $arrData = $user;

        // condition success
        return response()->json([
            'message' => "Success get data for user",
            'code' => 200,
            'data' => $arrData
        ], 200);
    }
}
