@extends('templates.app')

@section('title', 'Bebidas')

@section('content')

    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 m-0">
                @if ($lista == 'desejos')
                    Lista de Desejos
                @elseif ($lista == 'adega')
                    Sua Adega
                @endif
            </h1>

            <a href="{{ route('bebidas.create') }}" class="btn btn-primary">
                Adicionar Garrafa
            </a>
        </div>

        <div class="row mb-4 g-2 align-items-end">
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
                        <option value="valor_asc" {{ request('sort') == 'valor_asc' ? 'selected' : '' }}>Valor ↑</option>
                        <option value="valor_desc" {{ request('sort') == 'valor_desc' ? 'selected' : '' }}>Valor ↓</option>
                        <option value="ano_asc" {{ request('sort') == 'ano_asc' ? 'selected' : '' }}>Ano ↑</option>
                        <option value="ano_desc" {{ request('sort') == 'ano_desc' ? 'selected' : '' }}>Ano ↓</option>
                    </select>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                    <a href="{{ route('bebidas.index', $lista) }}" class="btn btn-outline-secondary ms-2">Limpar
                        filtros</a>
                </div>
            </form>
        </div>


        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">

            @forelse($bebidas as $bebida)
                <div class="col">
                    <div class="card h-100 shadow-sm border-0 rounded-3">

                        <div class="ratio ratio-4x3 overflow-hidden rounded-top">
                            <img src="{{ $bebida->foto ? asset('storage/' . $bebida->foto) : asset('storage/' . $bebida->tipo->foto) }}"
                                class="w-100 h-100 object-fit-cover" alt="Foto da bebida" style="object-fit: cover;">
                        </div>

                        <div class="card-body">

                            <h5 class="card-title fw-bold text-dark">
                                {{ $bebida->nome }}
                            </h5>

                            @if ($bebida->desc)
                                <p class="text-muted small mb-2">
                                    {{ Str::limit($bebida->desc, 80) }}
                                </p>
                            @endif

                            <ul class="list-unstyled small text-secondary mb-0">
                                <li><span class="fw-semibold">Tipo:</span> {{ $bebida->tipo->nome }}</li>
                                <li><span class="fw-semibold">Ano:</span> {{ $bebida->ano }}</li>
                                <li><span class="fw-semibold">Quantidade:</span> {{ $bebida->quantidade }}</li>
                                <li><span class="fw-semibold">Capacidade:</span> {{ $bebida->capacidade }} ml</li>
                                <li><span class="fw-semibold">Valor:</span> R$
                                    {{ number_format($bebida->valor, 2, ',', '.') }}</li>
                            </ul>

                        </div>

                        <div class="card-footer bg-white border-0 pb-3">
                            <a href="{{ route('bebidas.show', $bebida->id) }}" class="btn btn-outline-primary w-100">
                                Detalhes
                            </a>
                        </div>

                    </div>
                </div>
            @empty
                <td colspan="4" class="text-center py-4 text-muted">
                    Ainda não há bebidas!
                </td>
            @endforelse

        </div>

    </div>

@endsection
