<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function login(Request $request)
    {
        $auth = Auth::attempt($request->all());


        if ($auth) {
        //

        } else {
            return response('Wrong data');
        }



        // return $request;
    }
}
