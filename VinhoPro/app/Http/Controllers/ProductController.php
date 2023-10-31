<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Product, Category};

class ProductController extends Controller
{
    public function index()
    {
        if (!auth()->user()->hasPermission('product_view')) {
            return redirect()->route('home')->with('error', 'Você não tem permissão para listar produtos.');
        }

        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        if (!auth()->user()->hasPermission('product_create')) {
            return redirect()->route('home')->with('error', 'Você não tem permissão para criar produtos.');
        }

        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        if (!auth()->user()->hasPermission('product_create')) {
            return redirect()->route('home')->with('error', 'Você não tem permissão para criar produtos.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category_id'),
        ]);

        return redirect()->route('product.index')->with('success', 'Produto cadastrado com sucesso!');
    }

    public function show(Product $product)
    {
        if (!auth()->user()->hasPermission('product_view')) {
            return redirect()->route('home')->with('error', 'Você não tem permissão para visualizar produtos.');
        }

        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        if (!auth()->user()->hasPermission('product_edit')) {
            return redirect()->route('home')->with('error', 'Você não tem permissão para editar produtos.');
        }


        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        if (!auth()->user()->hasPermission('product_edit')) {
            return redirect()->route('home')->with('error', 'Você não tem permissão para editar produtos.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category_id'),
        ]);

        return redirect()->route('product.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Product $product)
    {
        if (!auth()->user()->hasPermission('product_delete')) {
            return redirect()->route('home')->with('error', 'Você não tem permissão para excluir produtos.');
        }

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Produto excluído com sucesso!');
    }
}
