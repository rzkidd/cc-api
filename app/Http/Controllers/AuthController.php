<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login (Request $request){
        $body = json_decode($request->getContent());
        $user = User::where('email', $body->email)->get()[0];
        // dd($user[0]->password);
        if($body->password != $user->password) {
            return response([
                'status' => 'error',
                'message' => 'Invalid credentials.'
            ], 400);
        } else {
            return response([
                'status' => 'success',
                'message' => 'Login success!'
            ]);
        }
    }

    public function register(Request $request)
    {
        $body = json_decode($request->getContent(), true);
        try {
            $user = User::create($body);
        } catch (\Throwable $th) {
            return response([
                'status' => 'error',
                'message' => 'Error code : ' . $th->getCode(),
            ], 400);
        }
        return response([
            'status' => 'success',
            'message' => 'Account created!',
        ], 201);
    }
}
