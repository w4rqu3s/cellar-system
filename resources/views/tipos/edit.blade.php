@extends('templates.app')

@section('title', 'Editar Tipo')

@section('content')
    <h1 class="h3 mb-4">Editar Tipo</h1>

    <div class="card">
        <div class="card-body">

            @can('update', $tipo)
            <form action="{{ route('tipos.update', $tipo->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @php $foto_required = false; @endphp
                @include('tipos._form', compact('foto_required'))

                <button class="btn btn-primary">Atualizar</button>

                <a href="{{ url()->previous() }}" class="btn btn-secondary ms-2">
                    Voltar
                </a>

            </form>
            @endcan

        </div>
    </div>
@endsection