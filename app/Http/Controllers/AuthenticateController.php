<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticateController extends Controller
{
    public function login(){
        /* verifica se o usuário existe */
        // if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
        //     $user = Auth::user(); 
        //     $success['user']  =  $user;
        //     $success['token'] =  $user->createToken('MyApp')->accessToken;
        //     return response()->json($success, $this->successStatus); 
        // } 
        // else{ 
        //     return response()->json(['error'=>'Unauthenticated'], 401); 
        // } 
        return 'Login';
    }

    public function logout(){
        /* verifica se o usuário existe */
        // if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
        //     $user = Auth::user(); 
        //     $success['user']  =  $user;
        //     $success['token'] =  $user->createToken('MyApp')->accessToken;
        //     return response()->json($success, $this->successStatus); 
        // } 
        // else{ 
        //     return response()->json(['error'=>'Unauthenticated'], 401); 
        // } 
        return 'logout';
    }
}
