<?php

namespace App\Http\Controllers\User;

// import controller
use App\Http\Controllers\Controller;

// import model
use App\Models\MstUser;

use Exception;

class GetUser extends Controller
{
    function getUser()
    {
        // get all data
        $userAll = MstUser::all();

        // validate data from tabel mst_user
        try {
            // Joinning table
            $user =  MstUser::select(
                'mst_user.id',
                'mst_user.password',
                'mst_user.username',
                'mst_user_role.role_name',
                'mst_user_data.photo_profile',
                'mst_user_data.no_telp',
                'mst_user_data.first_name',
                'mst_user_data.last_name',
            )
                ->join('mst_user_role', 'mst_user.id_user_role', '=', 'mst_user_role.id')
                ->leftJoin('mst_user_data', 'mst_user.id', '=', 'mst_user_data.user_id')
                // ->where("mst_user.id", $userAll)
                ->get();

            // validate data from tabel mst_user
            if (!$user) {
                return response()->json([
                    'message' => "user not found",
                    'code' => 404,
                    'data' => array()
                ], 404);
            }

            // dump data to empty array 
            // $arrData = [];
            // array_push($arrData, array(
            //     'id' => $user[0]->id,
            //     'first_name' => $user[0]->first_name,
            //     'last_name' => $user[0]->last_name,
            //     'phone_number' => $user[0]->no_telp,
            //     'photo_profile' => $user[0]->photo_profile,
            // ));

            // condition success
            return response()->json([
                'message' => "Success get data for user",
                'code' => 200,
                'data' => $user,
            ], 200);
        } catch (Exception $e) {
            if ($e->getCode() != 0) {
                return response()->json([
                    'message' => "Internal Server error",
                    'code' => 500,
                    'data' => $e->getCode(),
                ], 500);
            }
            return response()->json([
                'message' => "Data Not Found",
                'code' => 404,
                'data' => array(),
            ], 404);
        }
    }
}
