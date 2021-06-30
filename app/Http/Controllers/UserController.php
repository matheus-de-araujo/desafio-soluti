<?php

namespace App\Http\Controllers;

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
        User::create($request->all());
    }

    /**
     * Lista usuário de acordo com o $id
     */
    public function show($id)
    {
        return User::findOrFail($id);
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
