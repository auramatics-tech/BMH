<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Http\Request;
use Validator;
use Hash;
use DB;
use Auth;

use App\Models\User;

class AuthController extends BaseController   
{

    /**
     * Handle an incoming login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */


    public function login(Request $request)
    {

        $rules = [
            'email' => ['required'],
            'password' => ['required']
        ];
        $credentials = Validator::make($request->all(), $rules);

        if ($credentials->fails()) {
            $errors = $credentials->messages();
            return $this->sendError(__('api.Missing required fields'), $errors, 403); 
        }

        $credentials = $request->only('email', 'password'); 

        if (Auth::attempt($credentials)) {
            $user = User::with('getAllServices')->where('id',Auth::id())->first();
    
            if ($user->role == 2) {
                // If user role is 2, update role and generate access token
                $user->role = 2;
                $user->save();
    
                $success['accessToken'] = $user->createToken('AuthToken')->plainTextToken;
                $success['user'] = $user;
    
                return $this->sendResponse($success, __('api.Login successful'));
            } else {
                // If user role is not 2, logout and return unauthorized
                Auth::logout();
                return $this->sendError('Unauthorized.');
            }
        }

        return $this->sendError('Unauthorized.');  
    }
}
