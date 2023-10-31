@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts.alerts')

    @if(isset($categoryName))
        <div class="category-header">
            <h2>{{ $categoryName }}</h2>
        </div>
    @endif

    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card product-card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">Categoria: {{ $product->category->name }}</p>
                        <a href="{{ route('home.productshow',  $product->id) }}" class="btn btn-primary">Ver Detalhes</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
<style>
    /* Adicione esse CSS no seu arquivo de estilo (por exemplo, style.css) */

/* Estilos para a seção de categoria */
.category-header {
    background: linear-gradient(to right, #4A90E2, #4A3579);
    color: #fff;
    text-align: center;
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 20px;
    font-size: 24px;
    font-weight: bold;
}

/* Estilos para o card de produto */
.product-card {
    transition: transform 0.2s ease-in-out;
}

.product-card:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 16px rgba(0,0,0,0.1);
}

.product-card .card-body {
    opacity: 0.9;
    transition: opacity 0.2s ease-in-out;
}

.product-card:hover .card-body {
    opacity: 1;
}

.product-card .btn-primary {
    background: #4A90E2;
    border: none;
    transition: background 0.2s ease-in-out;
}

.product-card .btn-primary:hover {
    background: #4A3579;
}

</style>