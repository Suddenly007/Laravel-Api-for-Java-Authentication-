<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\User;

class LoginController extends Controller
{
     public function __construct(){
        $this->middleware('guest');
    }

    
    public function __invoke(LoginRequest $request)
    {
        $user=User::where('email', $request->email)->first();

        if (!$user || !\Hash::check($request->password, $user->password)) {
             return response()->json([
                'message'=> 'Invalid credentials'], 401);
         } 
         $token = $user->createToken('auth_token')->plainTextToken;

         return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
         ], 200);

    }
}
