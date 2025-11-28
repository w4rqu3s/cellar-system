@extends('templates.app')

@section('title', $bebida->nome)

@section('content')

    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 m-0">{{ $bebida->nome }}</h1>
            <div>
                <a href="{{ route('bebidas.edit', $bebida->id) }}" class="btn btn-warning me-2">Editar</a>
                <form action="{{ route('bebidas.destroy', $bebida->id) }}" method="POST" class="d-inline me-2">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar esta bebida?')">
                        Deletar
                    </button>
                </form>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Voltar</a>
            </div>
        </div>

        <div class="row g-4">
            {{-- Imagem principal --}}
            <div class="col-12 col-md-5">
                <div class="card shadow-sm rounded-4 border border-secondary overflow-hidden">
                    <img src="{{ $bebida->foto ? asset('storage/' . $bebida->foto) : asset('storage/' . $bebida->tipo->foto) }}"
                        class="w-100 h-100 object-fit-cover" alt="Foto da bebida" style="max-height:400px;">
                </div>
            </div>

            {{-- Informações detalhadas --}}
            <div class="col-12 col-md-7">
                <div class="card shadow-sm rounded-4 border border-secondary p-3 h-100">

                    @if ($bebida->desc)
                        <p class="text-muted mb-3">{{ $bebida->desc }}</p>
                    @endif

                    <ul class="list-unstyled mb-3">
                        <li><span class="fw-semibold">Tipo:</span> {{ $bebida->tipo->nome }}</li>
                        <li><span class="fw-semibold">Ano:</span> {{ $bebida->ano }}</li>
                        <li><span class="fw-semibold">Quantidade:</span> {{ $bebida->quantidade }}</li>
                        <li><span class="fw-semibold">
                                Capacidade:</span> {{ $bebida->capacidade }} {{ $bebida->capacidade < 1 ? 'ml' : 'L' }}
                        </li>
                        <li><span class="fw-semibold">Valor:</span> R$ {{ number_format($bebida->valor, 2, ',', '.') }}
                        </li>
                        <li><span class="fw-semibold">Lista:</span>
                            {{ ucfirst($bebida->lista ?? '-') }}
                        </li>
                    </ul>

                    {{-- Botão adicional ou ações --}}
                    <a href="{{ route('bebidas.index', $bebida->lista) }}" class="btn btn-outline-primary mt-3">
                        Voltar para lista
                    </a>
                    @if ($bebida->lista == 'desejos')
                        @if ($bebida->lista == 'desejos')
                            <form action="{{ route('bebidas.moverParaAdega', $bebida->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-outline-primary mt-3">Adicionar à Adega</button>
                            </form>
                        @endif
                    @endif
                </div>
            </div>
        </div>

    </div>

@endsection
