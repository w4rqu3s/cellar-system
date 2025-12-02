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

    {{-- Cards das bebidas --}}
    <div class="row g-4">

        @forelse ($bebidas as $bebida)
            @can('view', $bebida)  
                <div class="col-md-4">

                    <div class="card shadow-sm h-100">

                        <img src="{{ $bebida->foto ? asset('storage/' . $bebida->foto) : asset('storage/' . $bebida->tipo->foto) }}"
                            class="card-img-top"
                            style="height: 220px; object-fit: cover;">

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
