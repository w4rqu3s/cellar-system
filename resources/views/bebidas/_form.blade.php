{{-- Nome --}}
<div class="mb-3">
    <label for="nome" class="form-label fw-semibold">Nome</label>
    <input type="text" id="nome" name="nome"
           value="{{ old('nome', $bebida->nome ?? '') }}"
           class="form-control" required>
</div>

{{-- Descrição --}}
<div class="mb-3">
    <label for="desc" class="form-label fw-semibold">Descrição (opcional)</label>
    <textarea id="desc" name="desc" class="form-control" rows="2">{{ old('desc', $bebida->desc ?? '') }}</textarea>
</div>

{{-- Quantidade --}}
<div class="mb-3">
    <label for="quantidade" class="form-label fw-semibold">Quantidade</label>

    <div class="input-group" style="max-width: 200px;">
        <button class="btn btn-outline-secondary" type="button" onclick="subtrair()">−</button>

        <input type="number" id="quantidade" name="quantidade"
               class="form-control text-center"
               value="{{ old('quantidade', $bebida->quantidade ?? 1) }}"
               min="1" required>

        <button class="btn btn-outline-secondary" type="button" onclick="adicionar()">+</button>
    </div>
</div>

{{-- Capacidade --}}
<div class="mb-3">
    <label for="capacidade" class="form-label fw-semibold">Capacidade (Litros)</label>
    <input type="number" id="capacidade" name="capacidade"
           value="{{ old('capacidade', $bebida->capacidade ?? '') }}"
           class="form-control" required>
</div>

{{-- Valor --}}
<div class="mb-3">
    <label for="valor" class="form-label fw-semibold">Valor (R$)</label>
    <input type="number" id="valor" name="valor" step="0.01"
           value="{{ old('valor', $bebida->valor ?? '') }}"
           class="form-control" required>
</div>

{{-- Foto --}}
<div class="mb-3">
    <label for="foto" class="form-label fw-semibold">Foto</label>
    <input type="file" id="foto" name="foto" class="form-control" accept="image/*">
</div>

{{-- Tipo --}}
<div class="mb-3">
    <label for="tipo" class="form-label fw-semibold">Tipo</label>
    <select id="tipo" name="tipo" class="form-select" required>
        <option value="">Selecione...</option>
        @foreach ($tipos as $tipo)
            <option value="{{ $tipo->id }}"
                {{ old('tipo', $bebida->tipo_id ?? '') == $tipo->id ? 'selected' : '' }}>
                {{ $tipo->nome }}
            </option>
        @endforeach
    </select>
</div>

{{-- Ano --}}
<div class="mb-3">
    <label for="ano" class="form-label fw-semibold">Ano de Fabricação ou Compra</label>
    <input type="number" id="ano" name="ano" min="1"
           value="{{ old('ano', $bebida->ano ?? '') }}"
           class="form-control" required>
</div>

{{-- Lista --}}
<label class="form-label fw-semibold">Lista</label>
<div class="mb-3">
    <div class="btn-group" role="group" aria-label="Lista">
        <input type="radio" class="btn-check" name="lista" id="lista_desejos" value="desejos"
            autocomplete="off" 
            {{ old('lista', $bebida->lista ?? '') == 'desejos' ? 'checked' : '' }}>
        <label class="btn btn-outline-primary" for="lista_desejos">Lista de Desejos</label>

        <input type="radio" class="btn-check" name="lista" id="lista_adega" value="adega"
            autocomplete="off"
            {{ old('lista', $bebida->lista ?? '') == 'adega' ? 'checked' : '' }}>
        <label class="btn btn-outline-primary" for="lista_adega">Sua Adega</label>
    </div>
</div>


<script>
    function adicionar() {
        const quantidade = document.getElementById("quantidade");
        quantidade.value = parseInt(quantidade.value) + 1;
    }

    function subtrair() {
        const quantidade = document.getElementById("quantidade");
        if (parseInt(quantidade.value) > 1) {
            quantidade.value = parseInt(quantidade.value) - 1;
        }
    }
</script>
