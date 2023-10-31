<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Profile};
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
{
    if (!auth()->user()->hasPermission('profile_view')) {
        return redirect()->route('home')->with('error', 'Você não tem permissão para ver perfils.');
    }
    $profiles = Profile::all(); // Recupere todos os perfis
    $permissions = config('permissions'); // Recupere as configurações de permissões

    return view('profiles.index', compact('profiles', 'permissions'));
}




    public function show(Profile $profile)
    {
        if (!auth()->user()->hasPermission('profile_show')) {
            return redirect()->route('home')->with('error', 'Você não tem permissão para ver perfils.');
        }
        return view('profiles.show', compact('profile'));
    }

    public function create()
    {
        if (!auth()->user()->hasPermission('profile_create')) {
            return redirect()->route('home')->with('error', 'Você não tem permissão para criar perfils.');
        }
        return view('profiles.create');
    }

    public function store(Request $request)
    {
        if (!auth()->user()->hasPermission('profile_create')) {
            return redirect()->route('home')->with('error','Você não tem permissão para criar perfils.');
        }
        $data = $request->validate([
            'name' => 'required|string',
            'permissions' => 'nullable|array',
        ]);

        Profile::create($data);

        return redirect()->route('profile.index')->with('success', 'Perfil criado com sucesso.');
    }

    public function edit(Profile $profile)
    {
        if (!auth()->user()->hasPermission('profile_edit')) {
            return redirect()->route('home')->with('error','Você não tem permissão para editar perfils.');
        }
        return view('profiles.edit', compact('profile'));
    }

    public function update(Request $request, Profile $profile)
    {
        if (!auth()->user()->hasPermission('profile_edit')) {
            return redirect()->route('home')->with('error','Você não tem permissão para editar perfils.');
        }
        $data = $request->validate([
            'name' => 'required|string',
            'permissions' => 'nullable|array',
        ]);

        $profile->update($data);

        return redirect()->route('profile.index')->with('success', 'Perfil atualizado com sucesso.');
    }

    public function destroy(Profile $profile)
    {
        if (!auth()->user()->hasPermission('profile_delete')) {
            return redirect()->route('home')->with('error','Você não tem permissão para deletar perfils.');
        }
        $profile->delete();

        return redirect()->route('profile.index')->with('success', 'Perfil deletado com sucesso.');
    }
}
