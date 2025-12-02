@extends('templates.app')

@section('title', 'Cadastrar Tipo')

@section('content')
    <h1 class="h3 mb-4">Cadastrar Novo Tipo</h1>

    <div class="card">
        <div class="card-body">
            @can('create', App\Models\Tipo::class)
            <form action="{{ route('tipos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @php $foto_required = true; @endphp
                @include('tipos._form', compact('foto_required'))

                <button class="btn btn-success">Salvar</button>

                <a href="{{ url()->previous() }}" class="btn btn-secondary ms-2">
                    Voltar
                </a>

            </form>
            @endcan

        </div>
    </div>
@endsection