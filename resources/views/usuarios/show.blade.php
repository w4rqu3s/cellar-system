@extends('templates.app')
@section('title', $user->name)

@section('content')

<div class="container" style="max-width: 850px;">

    <div class="card shadow-sm p-4">

        <div class="row g-4">

            <div class="col-md-7">
                <h2 class="fw-bold text-pink mb-2">{{ $user->name }}</h2>
                
                <p class="fs-5 fw-semibold">{{ $user->email }}</p>

                <p class="text-muted mb-1"><strong>ID:</strong> {{ $user->id }}</p>
                <p class="text-muted mb-1"><strong>Criado Em:</strong> {{ $user->created_at }}</p>
                <p class="text-muted mb-1"><strong>Última Atualização:</strong> {{ $user->updated_at }}</p>

                <div class="d-flex gap-2 mt-4">                
                    @can('ban', $user)
                        <form action="{{ route('usuarios.ban', $user->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja banir {{ $user->name }}?');">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger">
                                Banir
                            </button>
                        </form>
                    @endcan

                    @can('viewAny', App\Models\User::class)
                        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">
                            Voltar
                        </a>
                    @endcan
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
