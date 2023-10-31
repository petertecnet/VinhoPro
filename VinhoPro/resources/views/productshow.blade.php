@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts.alerts')

    <div class="row">
        <div class="col-md-12">
            <div class="wine-details">
                <h2 class="wine-title">{{ $product->name }}</h2>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-md-8">
            <div class="wine-description">
                <p>{{ $product->description }}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="wine-details">
                <p class="wine-category">Categoria: {{ $product->category->name }}</p>
                <p class="wine-price">Preço: R$ {{ number_format($product->price, 2, ',', '.') }}</p>
            </div>
        </div>
    </div>

    <!-- Section de produtos relacionados -->
    <div class="row mt-4 p-6">
        <div class="col-md-7 border border-dark p-5 m-2 bg-dark text-white">
        <div class="row">
        <div class="col-md-12">
            <div class="wine-details">
                <h2 class="wine-title">Veja também</h2>
            </div>
        </div>
    </div>
            <!-- Carrossel de produtos relacionados -->
            <div id="related-products-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- Iterar sobre os produtos relacionados -->
                    @foreach($randomProducts as $index => $relatedProduct)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $relatedProduct->name }}</h5>
                                    <p class="card-text">{{ $relatedProduct->category->name }}</p>
                                    <p class="card-text">Preço: R$ {{ number_format($relatedProduct->price, 2, ',', '.') }}</p>
                                    <a href="{{ route('home.productshow', ['id' => $relatedProduct->id]) }}" class="btn btn-primary">Detalhar</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Controles do carrossel -->
                <button class="carousel-control-prev" type="button" data-bs-target="#related-products-carousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#related-products-carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-md-4 border border-dark p-1 m-2  bg-dark text-white">
        <div class="row">
        <div class="col-md-12">
            <div class="wine-details">
                <h2 class="wine-title">Confira estas categorias</h2>
            </div>
        </div>
    </div>
            <!-- Carrossel de categorias relacionadas -->
            <div id="related-categories-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- Iterar sobre as categorias relacionadas -->
                    @foreach($randomCategories as $index => $relatedCategory)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $relatedCategory->name }}</h5>
                                    <p class="card-text">{{ $relatedCategory->description }}</p>
                                    <a href="{{ route('category.products', ['category_id' => $relatedCategory->id]) }}" class="btn btn-primary">Ver Produtos</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Controles do carrossel -->
                <button class="carousel-control-prev" type="button" data-bs-target="#related-categories-carousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#related-categories-carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

</div>
@endsection
<style>
    /* Estilos para o carrossel de produtos relacionados */
    #related-products-carousel {
        margin-top: 20px;
    }

    #related-products-carousel .carousel-inner {
        max-height: 400px; /* Ajuste a altura conforme necessário */
    }

    #related-products-carousel .carousel-item {
        text-align: center;
    }

    #related-products-carousel .card {
        width: 18rem; /* Ajuste a largura conforme necessário */
        margin: 0 auto;
    }

    /* Estilos para o carrossel de categorias relacionadas */
    #related-categories-carousel {
        margin-top: 20px;
    }

    #related-categories-carousel .carousel-inner {
        max-height: 400px; /* Ajuste a altura conforme necessário */
    }

    #related-categories-carousel .carousel-item {
        text-align: center;
    }

    #related-categories-carousel .card {
        width: 18rem; /* Ajuste a largura conforme necessário */
        margin: 0 auto;
    }
    /* Estilos para a seção de detalhes do vinho */
.wine-details {
    background: linear-gradient(to bottom, #8B0000, #4B0082);
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    text-align: center;
    color: #fff;
}

/* Estilos para o título do vinho */
.wine-title {
    font-size: 2.5rem;
    margin-bottom: 15px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}

/* Estilos para a descrição do vinho */
.wine-description p {
    font-size: 1.25rem;
    margin-bottom: 20px;
    text-align: justify;
}

/* Estilos para a categoria e preço do vinho */
.wine-category,
.wine-price {
    font-size: 1.2rem;
    font-weight: bold;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
}

/* Estilos para o bullet antes da categoria */
.wine-category::before {
    content: "\2022";
    color: #FFD700;
    margin-right: 8px;
}

/* Estilos para o preço do vinho */
.wine-price {
    margin-top: 15px;
    border: 2px solid #FFD700;
    border-radius: 5px;
    padding: 5px 10px;
    display: inline-block;
    transition: transform 0.3s;
}

/* Efeito de zoom no preço ao passar o mouse */
.wine-price:hover {
    transform: scale(1.1);
}

/* Estilos para os botões de detalhes do vinho */
.wine-details p {
    border: 1px solid #FFD700;
    border-radius: 5px;
    padding: 5px 10px;
    display: inline-block;
    margin: 5px;
    transition: transform 0.3s;
}

/* Efeito de zoom nos botões de detalhes ao passar o mouse */
.wine-details p:hover {
    transform: scale(1.1);
}

/* Estilos para os carrosséis */
#related-products-carousel,
#related-categories-carousel {
    margin-top: 20px;
}

/* Estilos para os itens dentro do carrossel */
#related-products-carousel .carousel-inner,
#related-categories-carousel .carousel-inner {
    max-height: 400px;
}

#related-products-carousel .carousel-item,
#related-categories-carousel .carousel-item {
    text-align: center;
}

/* Estilos para os cards dentro do carrossel */
#related-products-carousel .card,
#related-categories-carousel .card {
    width: 18rem;
    margin: 0 auto;
}

</style>
