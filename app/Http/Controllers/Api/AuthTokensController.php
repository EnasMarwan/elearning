<?php

namespace App\Http\Controllers\Api;

use App\Models\Tranier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;

class AuthTokensController extends Controller
{
    public function index(Request $request)
    {
        return $request->user()->tokens;
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'device_name' => 'required',

        ]);

        $trainer=Tranier::where('email' , '=' ,$request->email)->first();

        if ($trainer && Hash::check($request->password, $trainer->password))
        {
            $token= $trainer->createToken($request->device_name , ['*']);

            return Response::json([
                'token' => $token->plainTextToken,
                'trainer' => $trainer,
            ],201);
        }

        return Response::json([
            'message' => 'Invalid Credentials'
        ],401);
    }

    public function destroy($id)
    {
        $user =Auth::guard('sanctum')->user();
        $user->tokens()->findOrFail($id)->delete();

        return [
            'message' => 'token deleted'
        ];
    }
}
