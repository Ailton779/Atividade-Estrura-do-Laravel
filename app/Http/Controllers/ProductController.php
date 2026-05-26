<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Lista todos os produtos
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Exibe o formulário de cadastro
    public function create()
    {
        return view('products.create');
    }

    // Salva o novo produto no banco
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

        return redirect()->route('products.index')
            ->with('sucesso', 'Produto cadastrado com sucesso!');
    }

    // Exibe os detalhes de um produto
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    // Exibe o formulário de edição
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    // Atualiza o produto no banco
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

        return redirect()->route('products.index')
            ->with('sucesso', 'Produto atualizado com sucesso!');
    }

    // Exclui o produto do banco
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')
            ->with('sucesso', 'Produto excluído com sucesso!');
    }
}