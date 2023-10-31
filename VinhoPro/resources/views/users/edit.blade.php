@extends('layouts.app')

@section('content')
<div class="container">@include('layouts.alerts')
    <div class="row mt-2 justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Usuário') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row mt-2">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Endereço de E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Adicione mais campos conforme necessário -->

                        <div class="form-group row mt-2">
                            <label for="profile_id" class="col-md-4 col-form-label text-md-right">{{ __('Perfil') }}</label>

                            <div class="col-md-6">
                                <select id="profile_id" class="form-control @error('profile_id') is-invalid @enderror" name="profile_id" required>
                                    <option value="" disabled>Selecione um perfil</option>
                                    @foreach($profiles as $profile)
                                        <option value="{{ $profile->id }}" {{ $profile->id == $user->profile_id ? 'selected' : '' }}>{{ $profile->name }}</option>
                                    @endforeach
                                </select>

                                @error('profile_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-2 mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Atualizar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
