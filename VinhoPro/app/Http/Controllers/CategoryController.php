<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        if (!auth()->user()->hasPermission('category_view')) {
            return redirect()->route('home')->with('error', 'Você não tem permissão para listar categorias.');
        }

        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        if (!auth()->user()->hasPermission('category_create')) {
            return redirect()->route('home')->with('error', 'Você não tem permissão para criar categorias.');
        }

        return view('categories.create');
    }

    public function store(Request $request)
    {
        if (!auth()->user()->hasPermission('category_create')) {
            return redirect()->route('home')->with('error', 'Você não tem permissão para criar categorias.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('category.index')->with('success', 'Categoria cadastrada com sucesso!');
    }

    public function show(Category $category)
    {
        if (!auth()->user()->hasPermission('category_view')) {
            return redirect()->route('home')->with('error', 'Você não tem permissão para visualizar categorias.');
        }

        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        if (!auth()->user()->hasPermission('category_edit')) {
            return redirect()->route('home')->with('error', 'Você não tem permissão para editar categorias.');
        }

        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        if (!auth()->user()->hasPermission('category_edit')) {
            return redirect()->route('home')->with('error', 'Você não tem permissão para editar categorias.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('category.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    public function destroy(Category $category)
    {
        if (!auth()->user()->hasPermission('category_delete')) {
            return redirect()->route('home')->with('error', 'Você não tem permissão para excluir categorias.');
        }

        $category->delete();

        return redirect()->route('category.index')->with('success', 'Categoria excluída com sucesso!');
    }
}
