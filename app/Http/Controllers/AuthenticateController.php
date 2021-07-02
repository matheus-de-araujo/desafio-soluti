<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Models\User;

class AuthenticateController extends Controller
{
    public function login(Request $request){

        $credenciais = request(['email', 'password']);

        /* verifica se o usuário existe */
        if(Auth::attempt($credenciais)){ 
            $user = $request->user(); 

            $response['user']  =  $user;
            $response['token'] =  $user->createToken('MyApp')->accessToken;

            return response()->json($response, 200); 
        } 
        else{ 
            $error = "Não Autorizado";
            $response = [
                'error' => $error,
            ];
            return response()->json($response, 401); 
        } 
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
