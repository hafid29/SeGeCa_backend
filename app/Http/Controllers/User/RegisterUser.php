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

class RegisterUser extends Controller {
    public function registerUser(Request $request) {
        $validator = Validator::make($request->all(),[
            'password' => 'required',
            'username' => 'required',
            'user_role' => 'required'
        ],[
            'password.required' => 'please fill password',
            'username.required' => 'please fill username',
            'user_role.required' => 'please fill user role',
        ]);
        
        // validator
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors(),
                'code'=> 500,
                'data'=> array()
            ],500);
        }
        
        try {
            $user = MstUser::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'id_user_role' => $request->user_role
            ]);
            return response()->json([
                'message' => "Success register user",
                'code'=> 201,
                'data'=> array()
            ],201);
        }catch (Exception $e) {
            return response()->json([
                'message' => "Failed register user",
                'code'=> 500,
                'error_code' =>$e->getCode(),
                'data'=> array(),
            ],500);
        }
    }
}
