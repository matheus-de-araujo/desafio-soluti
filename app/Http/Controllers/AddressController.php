<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Lista todos os Endereços
     */
    public function index()
    {
        return Address::all();
    }

    /**
     * Salva os endereços de acordo com os dados do $request
     */
    public function store(Request $request)
    {
        Address::create($request->all());
    }

    /**
     * Lista o endereço de acordo com o $id
     */
    public function show($id)
    {
        return Address::findOrFail($id);
    }

    /**
     * Atualiza informações do endereço com o $id de acordo com o $request
     */
    public function update(Request $request, $id)
    {
        $address =  Address::findOrFail($id);
        $address->update($request->all());
    }

    /**
     * Exclui o endereço com o $id
     */
    public function destroy($id)
    {
        $address =  Address::findOrFail($id);
        $address->delete();
    }
}
