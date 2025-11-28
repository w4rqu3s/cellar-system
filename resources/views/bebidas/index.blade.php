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

    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">

        @foreach ($bebidas as $bebida)
        <div class="col">
            <div class="card h-100 shadow-sm border-0 rounded-3">

                {{-- Imagem do card --}}
                <div class="ratio ratio-4x3 overflow-hidden rounded-top">
                    <img 
                        src="{{ $bebida->foto ? asset('storage/' . $bebida->foto) : asset('storage/' . $bebida->tipo->foto) }}"
                        class="w-100 h-100 object-fit-cover"
                        alt="Foto da bebida"
                        style="object-fit: cover;">
                </div>

                {{-- Corpo do card --}}
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
                        <li><span class="fw-semibold">Valor:</span> R$ {{ number_format($bebida->valor, 2, ',', '.') }}</li>
                    </ul>

                </div>

                {{-- Rodapé --}}
                <div class="card-footer bg-white border-0 pb-3">
                    <a href="{{ route('bebidas.show', $bebida->id) }}" class="btn btn-outline-primary w-100">
                        Detalhes
                    </a>
                </div>

            </div>
        </div>
        @endforeach

    </div>

</div>

@endsection
