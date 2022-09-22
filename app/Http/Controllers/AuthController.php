<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
        'name'=>'required|string',
        'email'=>'required|string|unique:users',
        'password'=>'required|min:6',
        'gender'=>'required|string',
        'birthday'=>'required|string',
        'bio'=>'nullable|string',
        ]);

        $user = new User([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>Hash::make($request->password) ,
        'gender'=>$request->gender,
        'birthday'=>$request->birthday,
        'bio'=>$request->bio,
        ]);

        $user->save();

        return response()->json(['data'=>[
            'message'=>'User has been registered',
        ]]);
    }


    public function login(Request $request){
        $users = User::all();
        print_r($users);
        $request->validate([
            'email'=>'required|string',
            'password'=>'required|min:6',
            ]);

            print_r($request->password);  


        // $credentials = request(['eamil,password']);
        $credentials = $request->only('email', 'password');

              
        if (!Auth::attempt($credentials)) {
            return response()->json(['message'=>'Unauthorized'],401);
        }

        $user = $request->user();

        $tonkenResult = $user->createToken('Personal Access Token');
        $token = $tonkenResult->token;
        $token->expires_at = Carbon::now()->addWeeks(8);
        $token->save();

        return response()->json(['data'=>[
            'user'=>Auth::user(),
            'access_token'=>$tonkenResult->accessToken,
            'token_type'=>'Bearer',
            'expires_at'=>Carbon::parse($tonkenResult->token->expires_at)->toDateTimeString(),
            'message'=>'User has been logged in',
        ]],200);
    }
}
