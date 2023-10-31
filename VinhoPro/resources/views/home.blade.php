@extends('layouts.app')

@section('content')

<div class="container mt-3">  
    
@include('layouts.alerts')
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

@endsection
