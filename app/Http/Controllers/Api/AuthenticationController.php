<?php

namespace App\Http\Controllers\Api;

use App\Http\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthenticateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    /**
     *This method is for issuing token
     * @param AuthenticateRequest $request
     * @return ApiResponse
     */
    public function authenticate(AuthenticateRequest  $request){

        $user = User::where('email', $request->get('email'))->first();

        if (!$user || !Hash::check($request->get('password'), $user->password)) {
            return new ApiResponse(401, errorMessage: 'Email or password is incorrect');
        }

        $token = $user->createToken('secret_token');
        return new ApiResponse(
            200,
            data: ['token' => $token->plainTextToken],
            message: 'Login Success!'
        );
    }
}
