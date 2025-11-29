<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        // Recupera os USUÁRIOS do BANCO DE DADOS
        $users = User::orderByDesc('id')->get();

        // Carrega a VIEW
        return view('users.index', ['users' => User::all()]);
    }

    public function show(User $user)
    {

        // Carrega a VIEW
        return view('users.show', ['user' => $user]);
    }

    public function create()
    {
        // Carrega a VIEW
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        // Validar o FORMULÁRIO
        $request->validated();

        // Salvar o USUÁRIO no BANCO DE DADOS
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirecionar para a ROTA de LISTAGEM de USUÁRIOS com MENSAGEM de SUCESSO
        return redirect()->route('user.index')->with('success', 'Usuário cadastrado com sucesso!');
    }

    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    public function update(UserRequest $request, User $user)
    {
        // Validar o FORMULÁRIO
        $request->validated();

        // Atualizar o USUÁRIO no BANCO DE DADOS
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);

        // Redirecionar USUÁRIOS com MENSAGEM de SUCESSO
        return redirect()->route('user.show', ['user' => $user->id ])->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy(User $user)
    {
        // Deletar o USUÁRIO do BANCO DE DADOS
        $user->delete();

        // Redirecionar para a ROTA de LISTAGEM de USUÁRIOS com MENSAGEM de SUCESSO
        return redirect()->route('user.index')->with('success', 'Usuário deletado com sucesso!');
    }

}
