<?php

namespace App\Http\Controllers;

use App\Models\{Product, Category};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        
        $products = Product::paginate(9); 
        

        $categories = Category::all();
        return view('home',  compact('products', 'categories'));
    }

    public function welcome()
    {
        
        $products = Product::paginate(9); 
        

        $categories = Category::all();
        return view('welcome',  compact('products', 'categories'));
    }
    public function product()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }
     public function category()
    {

        $categories = Category::all();
        return view('categories', compact('categories'));
    }

    public function showProduct($id)
    {
        $product = Product::findOrFail($id);
        $currentCategory = $product->category;
        $randomProducts = Product::where('category_id', '!=', $currentCategory->id)->inRandomOrder()->limit(5)->get();
        $randomProducts = $randomProducts->reject(function ($randomProduct) use ($id) {
            return $randomProduct->id == $id;
        });
        $randomCategories = Category::whereNotIn('id', [$currentCategory->id])->inRandomOrder()->limit(5)->get();
        return view('productshow', compact('product', 'randomProducts', 'randomCategories'));
    }
    

    public function categoryProduct($category_id)
    {
        $category = Category::findOrFail($category_id);
        $products = $category->products;
        return view('products', ['products' => $products, 'categoryName' => $category->name]);

    }
}
