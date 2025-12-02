@extends('templates.app')
@section('title', $bebida->nome)

@section('content')

<div class="container" style="max-width: 850px;">

    <div class="card shadow-sm p-4">

        <div class="row g-4">

            <div class="col-md-5 text-center">
                <img src="{{ $bebida->foto ? asset('storage/' . $bebida->foto) : asset('storage/' . $bebida->tipo->foto) }}"
                     class="img-fluid rounded"
                     style="max-height: 320px; object-fit: cover;">
            </div>

            <div class="col-md-7">
                <h2 class="fw-bold text-pink mb-2">{{ $bebida->nome }}</h2>

                @if ($bebida->desc)
                    <p class="text-muted mb-3">{{ $bebida->desc }}</p>
                @endif

                <p class="fs-5 fw-semibold">
                    R$ {{ number_format($bebida->valor, 2, ',', '.') }}
                </p>

                <p class="text-muted mb-1"><strong>Tipo:</strong> {{ $bebida->tipo->nome }}</p>
                <p class="text-muted mb-1"><strong>Ano:</strong> {{ $bebida->ano }}</p>
                <p class="text-muted mb-1"><strong>Quantidade:</strong> {{ $bebida->quantidade }}</p>
                <p class="text-muted mb-1"><strong>Capacidade:</strong>
                    @if ($bebida->capacidade < 1)
                        {{ $bebida->capacidade * 1000 }} ml
                    @else
                            {{ $bebida->capacidade }} L
                    @endif
                </p>


                <div class="d-flex gap-2 mt-4">
                    @can('update', $bebida)    
                        <a href="{{ route('bebidas.edit', $bebida->id) }}" class="btn btn-primary">
                            Editar
                        </a>
                    @endcan

                    @can('moverParaAdega', $bebida)
                        @if ($bebida->lista === "desejos")    
                            <a href="{{ route('bebidas.moverParaAdega', $bebida->id) }}" class="btn btn-warning">
                                Mover à Adega
                            </a>
                        @endif
                    @endcan
                    
                    @can('delete', $bebida)
                        <form action="{{ route('bebidas.destroy', $bebida->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger">
                                Excluir
                            </button>
                        </form>
                    @endcan

                    <a href="{{ route('bebidas.index', $bebida->lista) }}" class="btn btn-secondary">
                        Voltar
                    </a>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
