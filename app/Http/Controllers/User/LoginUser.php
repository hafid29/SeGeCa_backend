<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

// Import http
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use App\Models\MstUser;
use Illuminate\Support\Facades\Hash;
Use Exception;

class  LoginUser extends Controller{
    public function loginUser(Request $request) {
        $validator = Validator::make($request->all(),[
            'password' => 'required',
            'username' => 'required',
        ],[
            'password.required' => 'Please fill password',
            'username.required' => 'Please fill username',
        ]);

        
        // check username and get hashed password
        try {

            $users = MstUser::select(
                'mst_user.id',
                'mst_user.password',
                'mst_user.username',
                'mst_user_role.role_name',
                'mst_user_data.photo_profile',
                'mst_user_data.no_telp',
                'mst_user_data.first_name',
            )
            ->join('mst_user_role','mst_user.id_user_role','=','mst_user_role.id')
            ->leftJoin('mst_user_data','mst_user.id','=','mst_user_data.user_id')
            ->where("mst_user.username",$request->username)
            ->get();

            // var_dump($users);
            
            if (count($users) != 0) {
                
                // dump hashed password from db
                $hashedPassword = Hash::check($request->password,$users[0]->password);
                
                // validate password
                if (!$hashedPassword) {
                    return response()->json([
                        'message' => "Wrong password",
                        'code' => 401,
                        'data' => array()
                    ],401);
                }
                
                // dump response data after login
                $datas = [];
                array_push($datas,array(
                    'id' => $users[0]->id,
                    'username' => $users[0]->username,
                    'role_name' => $users[0]->role_name,
                    'user_datas' => array(
                        'photo_profile' => $users[0]->photo_profile,
                        'no_telp' => $users[0]->no_telp,
                        'first_name' => $users[0]->first_name
                    ),
                ));
                return response()->json([
                    'message' => "login success",
                    'code' => 200,
                    'datas' => $datas
                ],200);
            }
            return response()->json([
                'message' => 'Wrong username',
                'code' => 401,
                'data' => array(),
            ],401);
        } catch (Exception $e) {
            //throw $th;
            var_dump($e->getCode());
        }

    }
}
