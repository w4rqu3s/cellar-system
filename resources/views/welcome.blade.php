@extends('templates.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100 bg-light dark:bg-dark text-dark dark:text-light">
    <div class="text-center p-5 rounded shadow-sm bg-white dark:bg-secondary" style="max-width: 480px; width: 100%">

        <h1 class="fw-bold mb-3 text-primary">Adega App</h1>
        <p class="mb-4">Organize sua adega, acompanhe desejos e descubra novas bebidas. Comece criando sua conta ou fazendo login.</p>

        <div class="d-flex flex-column gap-3 mt-4">
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg w-100">Entrar</a>
            <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg w-100">Registrar</a>
        </div>

        <hr class="my-4">

        <small class="text-muted">Bem-vindo! Aproveite sua experiência :)</small>
    </div>
</div>
@endsection
