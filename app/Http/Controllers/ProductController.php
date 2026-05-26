<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'categoria' => 'required',
            'preco' => 'required|numeric',
            'estoque' => 'required|integer',
        ]);

        Product::create($request->all());

        return redirect('/products')->with('sucesso', 'Produto cadastrado com sucesso!');
    }

    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'categoria' => 'required',
            'preco' => 'required|numeric',
            'estoque' => 'required|integer',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect('/products')->with('sucesso', 'Produto atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/products')->with('sucesso', 'Produto excluído com sucesso!');
    }
}