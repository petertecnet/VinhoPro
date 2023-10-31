@extends('layouts.app')

@section('content')

@include('layouts.alerts')
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

    <div class="row mt-5">
        <div class="col-md-10 text-center">
            <p class="lead">Junte-se à VinhoPro hoje e comece a desfrutar de uma nova maneira de apreciar e gerenciar seus vinhos.</p>
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Registrar Agora</a>
        </div>
    </div>
</div>
@endsection
