@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts.alerts')
    <div class="card">
        <div class="card-header">Gerenciar Categorias</div>

        <div class="card-body">
            <a href="{{ route('category.create') }}" class="btn btn-success mb-3">Nova Categoria</a>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('category.show', $category->id) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary btn-sm">Editar</a>

                                <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $category->id }}">
                                    Excluir
                                </button>

                                <!-- The Modal -->
                                <div class="modal" id="deleteModal{{ $category->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Confirmar Exclusão</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                Tem certeza de que deseja excluir esta categoria?
                                            </div>
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="d-inline">
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
