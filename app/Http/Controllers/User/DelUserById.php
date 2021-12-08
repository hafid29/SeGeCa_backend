<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;

// import controller
use App\Http\Controllers\Controller;

// import model
use App\Models\MstUser;
use App\Models\MstUserData;

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
        $user_id = request()->route('id');

        try {
            
            // get user detail
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
            ->get();
            
            // validate data from tabel mst_user
            if (!$user) {
                return response()->json([
                    'message' => "user with id " . $user_id . " not found",
                    'code' => 404,
                    'data' => array()
                ], 404);
            }
        
            // send request to file-service
//        $client = new Client([
        //'base_uri' => 'http://37.44.244.196:4444/'
       // ]);
      //  $reqPath = "file/".$user[0]->photo_profile;
    //    $resp = $client->request("DELETE",$reqPath);

        // get json response from file service
  //      $encodeToString = (string) $resp->getBody();
//        $jsonDecode = json_decode($encodeToString);

        // delete data
        $affacted = MstUserData::where('user_id',$user_id)->delete();
        $isAffacted = MstUser::where('id',$user_id)->delete();
        return response()->json([
            'message' => "Success Delete user data",
            'code'=> 201,
            'data'=> array()
        ],201);
        } catch (Exception $e) {
            return response()->json([
                'message' => "Failed Delete user",
                'code'=> 500,
                'error_code' =>$e->getCode(),
                'data'=> array(),
            ],500);
        }
    }
}
