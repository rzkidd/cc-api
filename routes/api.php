<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', function(Request $request){
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
});
