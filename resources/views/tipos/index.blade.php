@extends('templates.app')

@section('title', 'Lista de Tipos')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 fw-bold">Tipos</h1>

    @can('create', App\Models\Tipo::class)
    <a href="{{ route('tipos.create') }}" class="btn btn-primary">
        Criar Tipo
    </a>
    @endcan
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
                @forelse ($tipos as $tipo)
                    <tr>
                        <td class="fw-semibold">{{ $tipo->nome }}</td>

                        @can('view', $tipo)    
                        <td class="text-center">
                            <a 
                                href="{{ route('tipos.show', $tipo->id) }}" 
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
                            Nenhum tipo cadastrado ainda.
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>

    </div>
</div>

@endsection
