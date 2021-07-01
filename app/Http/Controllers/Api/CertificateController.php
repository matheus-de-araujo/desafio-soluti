<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Lista todos os Certificados
     */
    public function index()
    {
        return Certificate::all();
    }

    /**
     * Salva os certificados de acordo com os dados do $request
     */
    public function store(Request $request)
    {
        Certificate::create($request->all());
    }

    /**
     * Lista o certificado de acordo com o $id
     */
    public function show($id)
    {
        return Certificate::findOrFail($id);
    }

    /**
     * Atualiza informações do certificado com o $id de acordo com o $request
     */
    public function update(Request $request, $id)
    {
        $certificate =  Certificate::findOrFail($id);
        $certificate->update($request->all());
    }

    /**
     * Exclui o certificado com o $id
     */
    public function destroy($id)
    {
        $certificate =  Certificate::findOrFail($id);
        $certificate->delete();
    }
}
