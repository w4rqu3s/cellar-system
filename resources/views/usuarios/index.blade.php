@extends('templates.app')

@section('title', 'Lista de Usuários')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Usuários</h1>
    </div>

    <div class="card">
        <div class="card-body p-0">

            <table class="table table-striped table-hover align-middle m-0">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>

                            <td class="text-center">
                                <a 
                                    href="{{ route('usuarios.show', $user->id) }}" 
                                    class="btn btn-sm btn-secondary"
                                >
                                    Acessar
                                </a>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">
                                Nenhum Usuário cadastrado.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>

@endsection