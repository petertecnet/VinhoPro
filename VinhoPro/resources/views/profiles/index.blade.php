@extends('layouts.app')

@section('content')
<div class="container">@include('layouts.alerts')
    <div class="card">
        <div class="card-header">Gerenciar Perfis</div>

        <div class="card-body">

            <a href="{{ route('profile.create') }}" class="btn btn-success mb-3">Novo Perfil</a>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Permissões</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($profiles as $profile)
                        <tr>
                            <td>{{ $profile->name }}</td>
                            <td>{{ $profile->description }}</td>
                            <td>  @foreach ($profile->permissions as $permission)
                                            <button type="button" class="btn btn-outline-info m-1 btn-sm">
                                                {{ $permissions[$permission]['name'] }}
                                              </button>
                                            @endforeach</td>
                            <td>
                                <a href="{{ route('profile.edit', $profile->id) }}" class="btn btn-primary btn-sm m-2">Editar</a>
                                <button type="button" class="btn btn-danger btn-sm m-2" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $profile->id }}">Excluir</button>
                            </td>
                        </tr>
                        <!-- Modal de confirmação de exclusão -->
                        <div class="modal fade" id="deleteModal{{ $profile->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirmação de Exclusão</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Tem certeza que deseja excluir o perfil "{{ $profile->name }}"?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <form action="{{ route('profile.destroy', $profile->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Excluir</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>
@endsection
