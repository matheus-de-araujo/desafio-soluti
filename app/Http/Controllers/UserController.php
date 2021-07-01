<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Telephone;
use App\Models\Address;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Lista todos os usuários
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Salva os Usuários de acordo com os dados do $request
     */
    public function store(Request $request)
    {
        $user = User::create($request->all());

        Telephone::create([
            'user_id' => $user->id,
            'telephone' => $request->telephone,
        ]);

        Address::create([
            'user_id' => $user->id,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'district' => $request->district,
            'street' => $request->street,
            'complement' => $request->complement,
            'cep' => $request->cep,
        ]);

    }

    /**
     * Lista usuário de acordo com o $id
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        
        $user->telephones;
        $user->address;
        $user->certificate;

        return $user;
    }

    /**
     * Atualiza informações do usuário com o $id de acordo com o $request
     */
    public function update(Request $request, $id)
    {
        $user =  User::findOrFail($id);
        $user->update($request->all());
    }

    /**
     * Exclui o usuário com o $id
     */
    public function destroy($id)
    {
        $user =  User::findOrFail($id);
        $user->delete();
    }
}
