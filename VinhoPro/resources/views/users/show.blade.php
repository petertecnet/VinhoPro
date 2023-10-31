@extends('layouts.app')

@section('content')
<div class="container">@include('layouts.alerts')
    <div class="row mt-2 justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Detalhes do Usuário') }}</div>

                <div class="card-body">
                    <div class="form-group row mt-2">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row mt-2">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Endereço de E-Mail') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" readonly>
                        </div>
                    </div>

                    <!-- Adicione mais campos conforme necessário -->

                    <div class="form-group row mt-2 mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">
                                {{ __('Editar') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
