<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;

// import controller
use App\Http\Controllers\Controller;

// import model
use App\Models\MstUser;

// http client
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use Illuminate\Http\Client\Response;

Use Exception;

class DelUserById extends Controller
{
    function delUserById(Request $request)
    {
        // find data by id
        // parse from url param
        $user_id = request()->route('id');;

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
            ->where("mst_user.id", $user_id)
            ->delete();
            
            // validate data from tabel mst_user
            if (!$user) {
                return response()->json([
                    'message' => "user with id " . $user_id . " not found",
                    'code' => 404,
                    'data' => array()
                ], 404);
            }
            // condition success
            return response()->json([
                'message' => "Delete success id" .$user_id ."user",
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
