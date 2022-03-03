<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register( Request $request )
    {
        $validator = Validator::make( $request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4',
            'confirm_password' => 'required|same:password'
        ]);

        if( !$validator->fails() ){
            $user = User::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => bcrypt( $request->get('password') ),
            ]);
            $token = $user->createToken('myapptoken')->plainTextToken;
            $response = [
                'user' => $user,
                'token' => $token
            ];
            return response($response, 201);
        }

        return response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ], 422);
    }


    public function login(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        if( $validator ){
            // Attempt to log in the user. If successful, update the gravatar and send a
            // 204 response code.
            if (Auth::attempt([
                'email' => $request->get('email'),
                'password' => $request->get('password')
            ])) {
                $user = auth()->user();
                $token = $user->createToken('myapptoken')->plainTextToken;
                $response = [
                    'token' => $token
                ];
                return response()->json($response, 201 );
            }else{
                return response()->json([
                    'error' => 'invalid_credentials'
                ], 403);
            }
        }

        return response()->json([
            'error' => 'invalid_credentials',
            403]);
    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        return[
            'message' =>'Logged out'
        ];
    }
}
