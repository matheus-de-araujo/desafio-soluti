<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;
use Illuminate\Support\Facades\DB;
use phpseclib\File\X509;

class CertificateController extends Controller
{
    /**
     * Salva os certificados de acordo com os dados do $request e o id do cliente
     */
    public function store(Request $request)
    {   
        // verifica se o certificado está no formato valido 
        if(!strpos($request['certificate']->getClientOriginalName(), '.pem')){
            return response()->json(['error'=> 'formato inválido'], 400); 
        }
        
        DB::beginTransaction();
        try {
            $data = file_get_contents($request['certificate']);

            $Certificate::create([
                'user_id' => $request->user_id, 
                'data' => $data,
            ]);

            DB::commit();
            return response()->json(['Response'=> 'Cadastrado com Sucesso'], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error'=> $e->message], 401); 
        }
    }

    /**
     * Lista o certificado de acordo com o $id
     */
    public function show($id)
    {
        return Certificate::findOrFail($id);
    }
}
