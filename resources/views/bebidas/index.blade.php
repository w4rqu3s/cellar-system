@extends('templates.app')
@section('title', 'Bebidas')

@section('content')

    <div class="container">

        {{-- Título + Botão --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-pink">Lista de Bebidas</h2>

            <a href="{{ route('bebidas.create') }}" class="btn btn-primary shadow-sm px-4">
                <i class="bi bi-plus-lg"></i> Nova Bebida
            </a>
        </div>

        {{-- FILTROS --}}
        <div class="row mb-4 g-2 align-items-end">
            @can('viewAny', App\Models\Bebida::class)
            <form method="GET" action="{{ route('bebidas.index', $lista) }}" class="d-flex flex-wrap gap-2 w-100">
                
                {{-- Pesquisa --}}
                <div class="flex-grow-1">
                    <input type="text" name="search" class="form-control" placeholder="Pesquisar pelo nome..."
                    value="{{ request('search') }}">
                </div>
                
                {{-- Filtro por tipo --}}
                <div>
                    <select name="tipo" class="form-select">
                        <option value="">Todos os tipos</option>
                        @foreach ($tipos as $tipo)
                        <option value="{{ $tipo->id }}" {{ request('tipo') == $tipo->id ? 'selected' : '' }}>
                            {{ $tipo->nome }}
                        </option>
                        @endforeach
                    </select>
                </div>
                
                {{-- Ordenação --}}
                <div>
                    <select name="sort" class="form-select">
                        <option value="">Ordenar por...</option>
                        <option value="valor_asc" {{ request('sort') == 'valor_asc' ? 'selected' : '' }}>Valor (crescente)
                        </option>
                        <option value="valor_desc" {{ request('sort') == 'valor_desc' ? 'selected' : '' }}>Valor
                            (decrescente)</option>
                        <option value="ano_asc" {{ request('sort') == 'ano_asc' ? 'selected' : '' }}>Ano (crescente)
                        </option>
                        <option value="ano_desc" {{ request('sort') == 'ano_desc' ? 'selected' : '' }}>Ano (decrescente)
                        </option>
                    </select>
                </div>
                
                <div>
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                    <a href="{{ route('bebidas.index', $lista) }}" class="btn btn-outline-secondary ms-2">Limpar
                        filtros</a>
                </div>
            </form>
            @endcan
        </div>

        

        {{-- Cards das bebidas --}}
        <div class="row g-4">

            @forelse ($bebidas as $bebida)
                @can('view', $bebida)
                    <div class="col-md-4">

                        <div class="card shadow-sm h-100">

                            <img src="{{ $bebida->foto ? asset('storage/' . $bebida->foto) : asset('storage/' . $bebida->tipo->foto) }}"
                                class="card-img-top" style="height: 220px; object-fit: cover;">

                            <div class="card-body">

                                <h5 class="card-title fw-bold">{{ $bebida->nome }}</h5>

                                <p class="text-muted mb-1">
                                    <i class="bi bi-tag"></i> {{ $bebida->tipo->nome }}
                                </p>

                                <p class="fw-semibold mb-2">
                                    R$ {{ number_format($bebida->valor, 2, ',', '.') }}
                                </p>

                                <a href="{{ route('bebidas.show', $bebida->id) }}"
                                    class="btn btn-outline-primary btn-sm w-100">
                                    Ver detalhes
                                </a>

                            </div>
                        </div>

                    </div>
                @endcan
            @empty
                <p class="text-center text-muted mt-5">Nenhuma bebida cadastrada ainda.</p>
            @endforelse

        </div>

    </div>
@endsection
