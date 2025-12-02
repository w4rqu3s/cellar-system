@extends('templates.app')
@section('title', 'Editar Bebida')

@section('content')

    <div class="container" style="max-width: 720px">

        <h2 class="fw-bold text-pink mb-4">Editar Bebida</h2>

        @can('update', $bebida)

            <div class="card shadow-sm p-4">

                <form action="{{ route('bebidas.update', $bebida->id) }}" method="POST" onsubmit="return confirm('Confirmar Alterações?');" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nome</label>
                        <input type="text" name="nome" class="form-control" value="{{ $bebida->nome }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Descrição (opcional)</label>
                        <textarea type="text" name="desc" class="form-control">{{ $bebida->desc ?? '' }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Ano</label>
                        <input type="year" name="ano" class="form-control" min="1" value="{{ $bebida->ano }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Quantidade</label>
                        <input type="number" name="quantidade" class="form-control" step="1" min="1"
                            value="{{ $bebida->quantidade }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Capacidade (Em Litros)</label>
                        <input type="number" name="capacidade" class="form-control" step="0.01" min="0.01"
                            value="{{ $bebida->capacidade }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Preço</label>
                        <input type="number" name="valor" class="form-control" step="0.01" min="0"
                            value="{{ $bebida->valor }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tipo</label>
                        <select name="tipo" class="form-select" required>
                            <option value="">Selecione...</option>
                            @foreach ($tipos as $tipo)
                                <option value="{{ $tipo->id }}" @selected($tipo->id === $bebida->tipo->id)>{{ $tipo->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Imagem</label>
                        <p class="text-muted mb-3">Não preencha para manter a mesma</p>
                        <input type="file" name="foto" class="form-control">
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
