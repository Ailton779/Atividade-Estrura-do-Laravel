@extends('layouts.app')

@section('conteudo')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Detalhes do Produto</h1>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Voltar</a>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $product->nome }}</h5>
            <hr>
            <p><strong>Descrição:</strong> {{ $product->descricao }}</p>
            <p><strong>Categoria:</strong> {{ $product->categoria }}</p>
            <p><strong>Preço:</strong> R$ {{ number_format($product->preco, 2, ',', '.') }}</p>
            <p><strong>Estoque:</strong> {{ $product->estoque }} unidades</p>
            <p><strong>Cadastrado em:</strong> {{ $product->created_at->format('d/m/Y H:i') }}</p>

            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Editar</a>

            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
            </form>
        </div>
    </div>
@endsection