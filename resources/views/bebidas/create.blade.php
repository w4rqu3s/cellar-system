@extends('templates.app')
@section('title', 'Cadastrar Bebida')

@section('content')

    <div class="container" style="max-width: 720px">

        <h2 class="fw-bold text-pink mb-4">Cadastrar Bebida</h2>

        @can('create', App\Models\Bebida::class)
            <div class="card shadow-sm p-4">

                <form action="{{ route('bebidas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nome</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Descrição (opcional)</label>
                        <textarea type="text" name="desc" class="form-control"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Ano</label>
                        <input type="year" name="ano" class="form-control" min="1" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Quantidade</label>
                        <input type="number" name="quantidade" class="form-control" step="1" min="1" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Capacidade (Em Litros)</label>
                        <input type="number" name="capacidade" class="form-control" step="0.01" min="0.01" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Preço</label>
                        <input type="number" name="valor" class="form-control" step="0.01" min="0" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tipo</label>
                        <select name="tipo" class="form-select" required>
                            <option value="">Selecione...</option>
                            @foreach ($tipos as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Imagem (opcional)</label>
                        <input type="file" name="foto" class="form-control">
                    </div>

                    <label class="form-label fw-semibold">Lista</label>
                    <div class="mb-3">
                        <div class="btn-group" role="group" aria-label="Lista">
                            <input type="radio" class="btn-check" name="lista" id="lista_adega" value="adega"
                                autocomplete="off">
                            <label class="btn btn-outline-primary" for="lista_adega">Sua Adega</label>

                            <input type="radio" class="btn-check" name="lista" id="lista_desejos" value="desejos"
                                autocomplete="off">
                            <label class="btn btn-outline-primary" for="lista_desejos">Lista de Desejos</label>
                        </div>
                    </div>

                    <button class="btn btn-primary w-100 py-2 mt-3">
                        Salvar
                    </button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary w-100 py-2 mt-3">
                        Voltar
                    </a>

                </form>

            </div>
        @endcan

    </div>

@endsection
