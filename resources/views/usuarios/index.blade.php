@extends('templates.app')

@section('title', 'Lista de Usuários')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 fw-bold">Usuários</h1>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">

        <table class="table table-striped table-hover align-middle m-0">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th class="text-center" style="width: 120px;"></th>
                </tr>
            </thead>

            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td class="fw-semibold">{{ $user->name }}</td>

                        @can('view', $user)    
                        <td class="text-center">
                            <a 
                                href="{{ route('usuarios.show', $user->id) }}" 
                                class="btn btn-sm btn-outline-primary"
                            >
                                Ver
                            </a>
                        </td>
                        @endcan
                    </tr>

                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-muted">
                            Nenhum usuário cadastrado ainda.
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>

    </div>
</div>

@endsection
