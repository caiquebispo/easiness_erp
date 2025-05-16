<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mockery\Exception;

class AuthService
{
    /**
     * Create a new class instance.
     */
    public function attempt(string $email, string $password): JsonResponse
    {

       $user = User::where('email', $email)->first();

        if (! $user || ! Hash::check($password, $user->password)) {

            return response()->json([
                'success'=> false,
                'message' => 'Credential Invalid.',
                'data' => []
            ], 401);
        }

        $token = $user->createToken('api_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login successfully.',
            'data' => [
                'user' => $user,
                'access_token' => $token,
                'token_type' => 'Bearer',
            ],
        ]);
    }
    public function logout()
    {
        try{

            Auth::user()->tokens()->delete();

            return response()->json([
                'success' => true,
                'message' => 'Logout successfully.',
                'data' => []
            ]);
        }catch(\Exception $e){

            throw new Exception('User not authenticated.', 524);
        }


    }
}
