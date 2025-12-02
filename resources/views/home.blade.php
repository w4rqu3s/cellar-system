<!-- resources/views/home.blade.php -->
@extends('templates.app')

@section('title', 'Home')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold">Bem-vindo</h1>
        <p class="text-muted fs-5">Selecione por onde gostaria de começar.</p>
    </div>

    <div class="row g-4">
        <!-- Card Adega -->
        @can('viewAny', App\Models\Bebida::class)    
        <div class="col-md-4">
            <div class="card shadow-sm border-0 card-hover">
                <div class="card-body text-center">
                    <h4 class="fw-semibold mb-3">Sua Adega</h4>
                    <p class="text-muted">Veja e gerencie todas as bebidas que você possui.</p>
                    <a href="{{ route('bebidas.index', 'adega') }}" class="btn btn-primary btn-lg w-100 mt-3">Acessar</a>
                </div>
            </div>
        </div>
        @endcan

        <!-- Card Lista de Desejos -->
        @can('viewAny', App\Models\Bebida::class)    
        <div class="col-md-4">
            <div class="card shadow-sm border-0 card-hover">
                <div class="card-body text-center">
                    <h4 class="fw-semibold mb-3">Lista de Desejos</h4>
                    <p class="text-muted">Armazene bebidas que deseja comprar mais tarde.</p>
                    <a href="{{ route('bebidas.index', 'desejos') }}" class="btn btn-primary btn-lg w-100 mt-3">Ver Lista</a>
                </div>
            </div>
        </div>
        @endcan

        <!-- Card Tipos de Bebidas -->
        @can('viewAny', App\Models\Tipo::class)    
        <div class="col-md-4">
            <div class="card shadow-sm border-0 card-hover">
                <div class="card-body text-center">
                    <h4 class="fw-semibold mb-3">Tipos de Bebidas</h4>
                    <p class="text-muted">Gerencie os tipos e categorias de bebidas.</p>
                    <a href="{{ route('tipos.index') }}" class="btn btn-primary btn-lg w-100 mt-3">Gerenciar</a>
                </div>
            </div>
        </div>
        @endcan

        @can('viewAny', App\Models\User::class)    
        <div class="col-md-4">
            <div class="card shadow-sm border-0 card-hover">
                <div class="card-body text-center">
                    <h4 class="fw-semibold mb-3">Admnistração de Usuários</h4>
                    <p class="text-muted">Gerencie os usuários da plataforma.</p>
                    <a href="{{ route('tipos.index') }}" class="btn btn-primary btn-lg w-100 mt-3">Gerenciar</a>
                </div>
            </div>
        </div>
        @endcan
    </div>

    <style>
        .card-hover {
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }
    </style>
</div>
@endsection