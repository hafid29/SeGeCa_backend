<?php

namespace App\Http\Controllers\User;

// import controller
use App\Http\Controllers\Controller;

// import model
use App\Models\MstUser;
use App\Models\MstUserData;
use Illuminate\Http\Request;
Use Exception;

class GetUserGetUserData extends Controller
{
    function getUserGetUserData(Request $request)
    {

        try {
            $userdata = MstUser::select(
                'mst_user.id',
                'mst_user.password',
                'mst_user.username',
                'mst_user_role.role_name',
                'mst_user_data.photo_profile',
                'mst_user_data.no_telp',
                'mst_user_data.first_name',
            )
                ->join('mst_user_role', 'mst_user.id_user_role', '=', 'mst_user_role.id')
                ->leftJoin('mst_user_data', 'mst_user.id', '=', 'mst_user_data.user_id')
                ->where("mst_user.username", $request->username)
                ->all();

            // variable
            // get all data

            // validate data from tabel mst_user
            if (!$userdata) {
                return response()->json([
                    'message' => "user not found",
                    'code' => 404,
                    'data' => array()
                ], 404);
            }
            // variable to find by id
            $arrData = $userdata;

            // condition success
            return response()->json([
                'message' => "Success get all data for user",
                'code' => 200,
                'data' => $arrData
            ], 200);
        } catch (Exception $e) {
            //throw $th;
            var_dump($e->getCode());
        }
    }
}
