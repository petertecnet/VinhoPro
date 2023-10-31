@extends('layouts.app')
@section('content')
<div class="content">
    <div class="container">@include('layouts.alerts')

    <div class="row ">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header card-header-primary">Novo perfil
                </div>
            @include('layouts.alerts')
            <div class="card-body">
                <form action="{{ route('profile.store') }}" method="post">
                    @method('POST')
                    @include('profiles.form')
                </form>
            </div>
        </div>
        </div>
        </div>
        </div>
</div>
@endsection
