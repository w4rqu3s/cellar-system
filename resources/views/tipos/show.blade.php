@extends('templates.app')

@section('title', $tipo->nome)

@section('content')

    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 m-0">{{ $tipo->nome }}</h1>
            <div>
                @can('update', $tipo)
                <a href="{{ route('tipos.edit', $tipo->id) }}" class="btn btn-warning me-2">Editar</a>
                @endcan
                @can('delete', $tipo)    
                <form action="{{ route('tipos.destroy', $tipo->id) }}" method="POST" class="d-inline me-2">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar esta bebida?')">
                        Deletar
                    </button>
                </form>
                @endcan
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Voltar</a>
            </div>
        </div>

        <div class="row g-4">
            {{-- Imagem principal --}}
            <div class="col-12 col-md-5">
                <div class="card shadow-sm rounded-4 border border-secondary overflow-hidden">
                    <img src="{{ asset('storage/' . $tipo->foto)}}"
                        class="w-100 h-100 object-fit-cover" alt="Foto da bebida" style="max-height:400px;">
                </div>
            </div>

            {{-- Informações detalhadas --}}
            <div class="col-12 col-md-7">
                <div class="card shadow-sm rounded-4 border border-secondary p-3 h-100">

                    @if ($tipo->desc)
                        <p class="text-muted mb-3">{{ $tipo->desc }}</p>
                    @endif

                    <ul class="list-unstyled mb-3">
                        <li><span class="fw-semibold">ID:</span> {{ $tipo->id }}</li>
                        <li><span class="fw-semibold">Criado em:</span> {{ $tipo->created_at }}</li>
                        <li><span class="fw-semibold">Última Edição:</span> {{ $tipo->updated_at }}</li>
                    </ul>

                   @can('viewAny', App\Models\Tipo::class)
                   <a href="{{ route('tipos.index') }}" class="btn btn-outline-primary mt-3">
                       Voltar para lista
                   </a>
                   @endcan
                </div>
            </div>
        </div>

    </div>

@endsection
