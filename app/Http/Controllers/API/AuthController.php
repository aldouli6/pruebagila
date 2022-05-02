<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\AppBaseController;
use Auth;
use App\Models\User;

class AuthController extends  AppBaseController
{
    public function register(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($request->all(), array(
            
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ));
        if ($validator->fails()) {
            $messages = $validator->messages();
            $result='';
            foreach ($messages->all() as $message){
                $result.=$message.',';
            }
            return response(['success'=>false, 'message'=>$result ]);
        }else{
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);

            $user = User::create($input);
            return response([ 'success'=>true,'data' => $user]);
        }
        
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return $this->sendError(
                'Credenciales Inválidas', 200
            );
        } 
        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        $user['access_token']  = $accessToken;
        return response(['success'=>true,'data' => $user]);

    }
    public function logout()
    {        
        if (Auth::check()) {
            Auth::user()->AauthAcessToken()->delete();
        }
        return response(['message' => 'Successfully logged out']);
    }
}
