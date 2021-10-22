<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

use Illuminate\Database\Eloquent\Model;
use App\Models\MstUserData;

use Illuminate\Support\Facades\Validator;
// Import http
use Illuminate\Http\Request;
// import
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use Illuminate\Http\Client\Response;
Use Exception;

class AddUserDetail extends Controller {
    public function addUserDetail(Request $request) {
        
        $validator = Validator::make($request->all(),[
            'no_telp' => 'required',
            'photo_profile' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'user_id' => 'required',
        ],[
            'no_telp.required' => 'please fill no telpon',
            'photo_profile.required' => 'please fill photo profile',
            'first_name.required' => 'please fill first name',
            'last_name.required' => 'please fill last name',
            'user_id.required' => 'please fill user id'
        ]);

        // validator
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors(),
                'code'=> 500,
                'data'=> array()
            ],500);
        }
        
        // file handler
        if ($request->file('photo_profile')) {
            $file = $request->file('photo_profile');
            $client = new Client([
                'base_uri' => 'http://127.0.0.1:4444',
            ]);
            $response = $client->request('POST','/file/upload',[
                'multipart' => [
                    [
                        'name' => 'upload_type',
                        'contents' => 'DOCUMENT'
                    ],
                    [
                        'name' => 'file',
                        'contents' => Psr7\Utils::tryFopen($file, 'r')
                    ]
                ]
            ]);
            
            // get json response from file service
            $encodeToString = (string) $response->getBody();
            $jsonDecode = json_decode($encodeToString);
            try {
                 // handle insert data
                $datas = MstUserData::create([
                    'no_telp' => $request->no_telp,
                    'photo_profile' => $jsonDecode->object_name,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'user_id' => $request->user_id,
                ]);
                return response()->json([
                    'message' => "Success add user data",
                    'code'=> 201,
                    'data'=> array()
                ],201);
            } catch (Exception $e) {
                return response()->json([
                    'message' => "Failed register user",
                    'code'=> 500,
                    'error_code' =>$e->getCode(),
                    'data'=> array(),
                ],500);
            }
        }
    }
}
