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

        if($request->user_id == null) {
            return response()->json(['error'=> 'Não informado o id do Usuário'], 400);
        }
        
        DB::beginTransaction();
        try {
            $data = file_get_contents($request['certificate']);

            Certificate::create([
                'user_id' => $request->user_id, 
                'data' => $data,
            ]);

            DB::commit();
            return response()->json(['Response'=> 'Cadastrado com Sucesso'], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json($e, 500); 
        }
    }

    /**
     * Lista o certificado de acordo com o $id
     */
    public function show($id)
    {
        try {
            //verifica se o ID é válido
            if(intval($id) === 0) {
                return response()->json(['error'=> 'O parametro não é válido'], 400);
            }

            $x509 = new X509();
            $certificate = Certificate::where('user_id',$id)->firstOrFail();
            
            $cert = $x509->loadX509($certificate->data);

            $structureCert = [
                'DN' => $x509->getDN(), 
                'issuerDN' => $x509->getIssuerDN(), 
                'validity' => $cert['tbsCertificate']['validity'],
            ];
            return response()->json($structureCert, 200);

        } catch (\Exception $e) {
            return response()->json($e, 500);
        }
    }
}
