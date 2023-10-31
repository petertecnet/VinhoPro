@extends('layouts.app')

@section('content')

@include('layouts.alerts')

<div class="container mt-3">
    <div class="row">
        <div class="col-md-3">
            <h3>Categorias</h3>
            <ul>
                @foreach($categories as $category)
                    <li><a href="{{ route('category.products', ['category_id' => $category->id]) }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </div>

        <div class="col-md-9">
            <h2>Todos os Produtos</h2>
            <nav aria-label="Page navigation">
  <ul class="pagination justify-content-center">
    <li class="page-item {{$products->currentPage() == 1 ? 'disabled' : ''}}">
      <a class="page-link" href="{{$products->previousPageUrl()}}" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>

    @for($i = 1; $i <= $products->lastPage(); $i++)
        <li class="page-item {{$i == $products->currentPage() ? 'active' : ''}}">
            <a class="page-link" href="{{$products->url($i)}}">{{$i}}</a>
        </li>
    @endfor

    <li class="page-item {{$products->currentPage() == $products->lastPage() ? 'disabled' : ''}}">
      <a class="page-link" href="{{$products->nextPageUrl()}}" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->category->name }}</p>
                                <p class="card-text">Preço: R$ {{ $product->price }}</p>
                                <a href="{{ route('home.productshow', ['id' => $product->id]) }}" class="btn btn-primary">Detalhar</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

<nav aria-label="Page navigation">
  <ul class="pagination justify-content-center">
    <li class="page-item {{$products->currentPage() == 1 ? 'disabled' : ''}}">
      <a class="page-link" href="{{$products->previousPageUrl()}}" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>

    @for($i = 1; $i <= $products->lastPage(); $i++)
        <li class="page-item {{$i == $products->currentPage() ? 'active' : ''}}">
            <a class="page-link" href="{{$products->url($i)}}">{{$i}}</a>
        </li>
    @endfor

    <li class="page-item {{$products->currentPage() == $products->lastPage() ? 'disabled' : ''}}">
      <a class="page-link" href="{{$products->nextPageUrl()}}" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>


        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 text-center">
            <h1 class="mb-4">Bem-vindo à VinhoPro</h1>
            <p class="lead">A sua plataforma de gestão de vinhos de forma simples e elegante.</p>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="card-title mb-3">Organize sua Adega</h3>
                    <p class="card-text">Mantenha um registro detalhado de seus vinhos, saiba a quantidade, tipo e safra de cada um, tudo em um só lugar.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="card-title mb-3">Descubra Novos Sabores</h3>
                    <p class="card-text">Explore nossa vasta coleção de vinhos e descubra novos rótulos que combinam com o seu paladar.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="card-title mb-3">Compartilhe Experiências</h3>
                    <p class="card-text">Conecte-se com outros amantes de vinho, compartilhe suas experiências e receba recomendações de vinhos de todo o mundo.</p>
                </div>
            </div>
        </div>
    </div>
@auth
    <div class="row mt-5">
        <div class="col-md-10 text-center">
            <p class="lead">Junte-se à VinhoPro hoje e comece a desfrutar de uma nova maneira de apreciar e gerenciar seus vinhos.</p>
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Registrar Agora</a>
        </div>
    </div>
    @endauth
</div>
@endsection
<style>
    /* Adicione este código ao seu arquivo de estilos CSS personalizado */

.custom-pagination .page-link {
    color: #007bff; /* Cor das setas */
    font-size: 1.25rem; /* Tamanho da fonte das setas */
}

.custom-pagination .page-link:hover {
    color: #0056b3; /* Cor ao passar o mouse sobre as setas */
}

.custom-pagination .page-item.disabled .page-link {
    pointer-events: none; /* Desabilitar cliques nas setas desativadas */
    color: #ccc; /* Cor das setas desativadas */
}

.custom-pagination .page-item.active .page-link {
    background-color: #007bff; /* Cor de fundo da página ativa */
    border-color: #007bff; /* Cor da borda da página ativa */
}

.custom-pagination .page-link:focus {
    box-shadow: none; /* Remover sombra ao focar na seta */
}

</style>