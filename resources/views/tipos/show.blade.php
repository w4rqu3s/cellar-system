@extends('templates.app')
@section('title', $tipo->nome)

@section('content')

<div class="container" style="max-width: 850px;">

    <div class="card shadow-sm p-4">

        <div class="row g-4">

            <div class="col-md-5 text-center">
                <img src="{{ asset('storage/' . $tipo->foto) }}"
                     class="img-fluid rounded"
                     style="max-height: 320px; object-fit: cover;">
            </div>

            <div class="col-md-7">
                <h2 class="fw-bold text-pink mb-2">{{ $tipo->nome }}</h2>

                @if ($tipo->desc)
                    <p class="text-muted mb-3">{{ $tipo->desc }}</p>
                @endif

                <p class="text-muted mb-1"><strong>ID:</strong> {{ $tipo->id }}</p>
                <p class="text-muted mb-1"><strong>Criado Em:</strong> {{ $tipo->created_at }}</p>
                <p class="text-muted mb-1"><strong>Última Atualização:</strong> {{ $tipo->updated_at }}</p>

                <div class="d-flex gap-2 mt-4">
                    @can('update', $tipo)    
                        <a href="{{ route('tipos.edit', $tipo->id) }}" class="btn btn-primary">
                            Editar
                        </a>
                    @endcan
                    
                    @can('delete', $tipo)
                        <form action="{{ route('tipos.destroy', $tipo->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger">
                                Excluir
                            </button>
                        </form>
                    @endcan

                    @can('viewAny', App\Models\Tipo::class)
                        <a href="{{ route('tipos.index') }}" class="btn btn-secondary">
                            Voltar
                        </a>
                    @endcan
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
