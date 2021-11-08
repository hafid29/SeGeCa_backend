<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Database\Eloquent\Model;
use App\Models\MstUser;
use App\Models\MstUserData;

use Illuminate\Support\Facades\Validator;
// Import http
use Illuminate\Http\Request;
// import
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use Illuminate\Http\Client\Response;
use Exception;

class GetUserById extends Controller
{
    function GetUserById(Request $request)
    {
        // find data by id
        $id = $request->input('id');

        $user =  MstUser::find($id);
        // validate data from database
        if (!$user) {
            return response()->json([
                'message' => "user type with id " . $id . " not found",
                'code' => 404,
                'data' => array()
            ], 404);
        }
        $arrData = [];
        array_push($arrData,array(
            'id' => $id['id'],
            'username' => $id['username'],
            'password' => $id['password']
        ));

        // validate requst param
        return response()->json([
            'message' => "Success get data for user",
            'code' => 200,
            'data' => array()
        ], 200);
    }
}
