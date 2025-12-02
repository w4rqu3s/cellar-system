@extends('templates.app')

@section('title', 'Adicionar Bebida')

@section('content')

    <div class="card shadow-sm rounded-4 p-4">
        <h1 class="h3 mb-4 px-3 px-md-0">Adicionar Bebida</h1>

        <div class="card">
            <div class="card-body">
                @can('create', App\Models\Bebida::class)
                <form action="{{ route('bebidas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @include('bebidas._form')

                    <button class="btn btn-success">Salvar</button>

                    <a href="{{ url()->previous() }}" class="btn btn-secondary ms-2">
                        Voltar
                    </a>

                </form>
                @endcan
            </div>
        </div>
    </div>
@endsection
