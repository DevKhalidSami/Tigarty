<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class APIController extends Controller
{
    //


    public function index(Request $request )
    {

        $userInfo = json_decode($request->input('userInfo'), true);

       $result = Auth::attempt(['mobile'=>$userInfo['phoneNumber'] , 'password'=>$userInfo['password']])->get();
        if($result)
        {
          return response()->json(['user_token'=>csrf_token()]);
        }
        return null;

    }

}
