<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User, Profile};

class UserController extends Controller
{
    public function index()
    {
        if (!auth()->user()->hasPermission('user_list')) {
            return redirect()->route('home')->with('error', 'Você não tem permissão para listar usuários.');
        }
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        if (!auth()->user()->hasPermission('user_create')) {
            return redirect()->route('home')->with('error', 'Você não tem permissão para criar usuários.');
        }
        
        $profiles = Profile::all();
        return view('users.create',  compact('profiles'));
    }

    public function store(Request $request)
    {
        if (!auth()->user()->hasPermission('user_create')) {
            return redirect()->route('home')->with('error', 'Você não tem permissão para criar usuários.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'profile_id' => $request->input('profile_id'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->route('user.index')->with('success', 'Usuário cadastrado com sucesso!');
    }

    public function show($id)
    {
        if (!auth()->user()->hasPermission('user_view')) {
            return redirect()->route('home')->with('error', 'Você não tem permissão para visualizar usuários.');
        }

        $user = User::find($id);

        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        if (!auth()->user()->hasPermission('user_edit')) {
            return redirect()->route('home')->with('error', 'Você não tem permissão para editar usuários.');
        }

        $user = User::find($id);

        $profiles = Profile::all();
        return view('users.edit', compact('user', 'profiles'));
    }

    public function update(Request $request, $id)
    {
        if (!auth()->user()->hasPermission('user_edit')) {
            return redirect()->route('home')->with('error', 'Você não tem permissão para editar usuários.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
        ]);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->profile_id = $request->input('profile_id');
        $user->save();

        return redirect()->route('user.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy($id)
    {
        if (!auth()->user()->hasPermission('user_delete')) {
            return redirect()->route('home')->with('error', 'Você não tem permissão para excluir usuários.');
        }

        $user = User::find($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Usuário excluído com sucesso!');
    }
}
