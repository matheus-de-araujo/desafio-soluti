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

    public function logout(Request $request){

        $logout = $request->user()->token()->revoke();

        if($logout) {
            $response['message'] = 'Logout Efetuado com Sucesso!';
            return response()->json($response, 200);
        }else {
            $response['message'] = 'Algo deu Errado.';
            return response()->json($response, 204);
        }
    }
}
