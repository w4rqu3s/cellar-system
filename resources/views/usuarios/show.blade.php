@extends('templates.app')

@section('title', $user->name)

@section('content')

    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 m-0">{{ $user->name }}</h1>
            <div>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Voltar</a>
            </div>
        </div>

        <div class="card shadow-sm rounded-4 border border-secondary p-3 h-100">

            <ul class="list-unstyled mb-3">
                <li><span class="fw-semibold">ID:</span> {{ $user->id }}</li>
                <li><span class="fw-semibold">Nome:</span> {{ $user->name }}</li>
                <li><span class="fw-semibold">Email:</span> {{ $user->email }}</li>
                <li><span class="fw-semibold">Criado em:</span> {{ $user->created_at }}</li>
                <li><span class="fw-semibold">Última Edição:</span> {{ $user->updated_at }}</li>
            </ul>

            @can('viewAny', App\Models\User::class)
            <a href="{{ route('usuarios.index') }}" class="btn btn-outline-primary mt-3">
                Voltar para lista
            </a>
            @endcan
        </div>


    </div>

@endsection
