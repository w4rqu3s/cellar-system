{{-- Nome --}}
<div class="mb-3">
    <label for="nome" class="form-label">Nome</label>
    <input 
        type="text" 
        id="nome" 
        name="nome" 
        value="{{ old('nome', $tipo->nome ?? '') }}"
        class="form-control"
        required
    >
</div>

{{-- Descrição --}}
<div class="mb-3">
    <label for="desc" class="form-label">Descrição (opcional)</label>
    <input 
        type="text" 
        id="desc" 
        name="desc" 
        value="{{ old('desc', $tipo->desc ?? '') }}"
        class="form-control"
        required
    >
</div>

{{-- Foto --}}
<div class="mb-3">
    <label for="foto" class="form-label">Foto</label>
    <input 
        type="file" 
        id="foto" 
        name="foto"
        class="form-control"
        accept="image/*"
        @if ($foto_required)
            required
        @endif
    >
</div>
