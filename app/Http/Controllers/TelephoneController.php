<?php

namespace App\Http\Controllers;

use App\Models\Telephone;
use Illuminate\Http\Request;

class TelephoneController extends Controller
{
    /**
     * Lista todos os Telefones
     */
    public function index()
    {
        return Telephone::all();
    }

    /**
     * Salva os telefones de acordo com os dados do $request
     */
    public function store(Request $request)
    {
        Telephone::create($request->all());
    }

    /**
     * Lista o telefone de acordo com o $id
     */
    public function show($id)
    {
        return Telephone::findOrFail($id);
    }

    /**
     * Atualiza informações do telefone com o $id de acordo com o $request
     */
    public function update(Request $request, $id)
    {
        $telephone =  Telephone::findOrFail($id);
        $telephone->update($request->all());
    }

    /**
     * Exclui o telefone com o $id
     */
    public function destroy($id)
    {
        $telephone =  Telephone::findOrFail($id);
        $telephone->delete();
    }
}
