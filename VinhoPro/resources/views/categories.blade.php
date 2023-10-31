@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts.alerts')

    <div class="row">
        @foreach($categories as $category)
            <div class="col-md-4 mb-4">
                <div class="card category-card">
                    <div class="card-body">
                        <h5 class="card-title text-white">{{ $category->name }}</h5>
                        <a href="{{ route('category.products', ['category_id' => $category->id]) }}" class="btn btn-primary">
                            Explore os Vinhos
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection


<style>
.category-card {
    background: linear-gradient(135deg, #8E0E00, #1F1C18);
    color: #FFF;
    border: none;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.category-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.category-card .card-title {
    font-size: 1.25rem;
    margin-bottom: 0.5rem;
}

.category-card .btn {
    background-color: rgba(255, 255, 255, 0.2);
    border: none;
}

.category-card .btn:hover {
    background-color: rgba(255, 255, 255, 0.4);
    color: #000;
}



</style>