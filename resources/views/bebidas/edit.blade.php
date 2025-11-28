@extends('templates.app')

@section('title', 'Adicionar Bebida')

@section('content')

    <h1 class="h3 mb-4">Atualizar Bebida</h1>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('bebidas.update', $bebida->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @include('bebidas._form')

                <button class="btn btn-success">Atualizar</button>

                <a href="{{ url()->previous() }}" class="btn btn-secondary ms-2">
                    Voltar
                </a>

            </form>

        </div>
    </div>
@endsection
