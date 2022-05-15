<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
         $validator = Validator::make($request->all(), [
             'first_name'=>'required|min:2|max:100',
             'last_name'=>'required|min:2|max:100',
             'email'=>'required|email|unique:users',
             'password'=>'required|min:6|max:100'
         ]);
 
         if ($validator->fails()) {
             return response()->json([
                 'message'=>'Validations fails',
                 'errors'=>$validator->errors()
             ],422);
         };

         $user=User::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        $token = $user->createToken('usertoken')->plainTextToken;


        return response()->json([
            'message'=>'Registration successfull',
            'data'=>$user,
            'token' => $token

        ],200);
 
       
    }
}
