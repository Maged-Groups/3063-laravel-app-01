<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    //

    public function login(LoginRequest $request)
    {
        // $data in case of local validation (inside controller)
        // $data = $request->validate([
        //     'email' => "required|email|exists:users,email",
        //     'password' => "required|between:8,20"
        // ], [
        //     'email.required' => 'لابد من كتابة البريد الإلكتروني',
        //     'email.exists' => 'email.not-exists'
        // ]);

        // $data in case of using the Request Class for validation (LoginRequest)
        $data = $request->validated();
        return $data;

        // $data in case of manual without validation
        // $data = $request->only(['email', 'password']);

        $auth = Auth::attempt($data);

        if ($auth) {
            $user = Auth::user();

            $token = $user->createToken('login');

            $user['token'] = $token->plainTextToken;

            return $user;
        }

        return 'No';

    }
}
