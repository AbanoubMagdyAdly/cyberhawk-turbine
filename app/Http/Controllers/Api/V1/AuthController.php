<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function auth(Request $request): JsonResponse
    {
        $user = User::where('email', $request->get('email'))->firstOrFail();
        if (!$user || !Hash::check($request->get('password'), $user->password)) {
            new \Exception('please check your email or password', 422);
        }

        return Response::json([
            'token' => $user->createToken($request->email)->plainTextToken
        ]);
    }


    public function me(Request $request): JsonResponse
    {
        $user = $request->user();

        return Response::json([
            'user' => $user
        ]);
    }
}
