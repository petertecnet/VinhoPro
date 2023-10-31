@extends('layouts.app')

@section('content')
<div class="container">@include('layouts.alerts')
    <div class="card">
        <div class="card-header">Gerenciar Usuários</div>

        <div class="card-body">
        <a href="{{ route('user.create') }}" class="btn btn-success mb-3">Novo Usuário</a>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">E-Mail</th>
                        <th scope="col">Perfil</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->profile)
                                {{ $user->profile->name }}
                            @else
                                <i>Nenhum Perfil Associado</i>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('user.show', $user->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary btn-sm">Editar</a>
                            
                            <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $user->id }}">
                                Excluir
                            </button>

                            <!-- The Modal -->
                            <div class="modal" id="deleteModal{{ $user->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Confirmar Exclusão</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            Tem certeza de que deseja excluir este usuário?
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Excluir</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>
@endsection
