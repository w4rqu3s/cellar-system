<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4 position-relative">
    <div class="container-fluid">

        {{-- Bloco esquerdo: Home --}}
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>
        </ul>

        @can('viewAny', App\Models\Bebida::class)
        {{-- Switch centralizado --}}
        <div class="container">
            <div class="position-absolute start-50 translate-middle-x">
                <div class="btn-group" role="group" aria-label="Lista Toggle">
                    <a href="{{ route('bebidas.index', 'adega') }}"
                    class="btn {{ request()->route('lista') == 'adega' ? 'btn-light text-primary' : 'btn-outline-light' }}">
                        Sua Adega
                    </a>
                    <a href="{{ route('bebidas.index', 'desejos') }}"
                    class="btn {{ request()->route('lista') == 'desejos' ? 'btn-light text-primary' : 'btn-outline-light' }}">
                        Lista de Desejos
                    </a>
                </div>
            </div>
            @can('dashboard-view')
            <a href="{{ route('dashboard.index') }}" class="btn">Dashboard</a>
            @endcan
        </div>
        @endcan

        {{-- Bloco direito: outros links --}}
        <ul class="navbar-nav ms-auto">
            @can('viewAny', App\Models\Tipo::class)
            <li class="nav-item">
                <a class="nav-link" href="{{ route('tipos.index') }}">Tipos</a>
            </li>
            @endcan
            @can('viewAny', App\Models\User::class)    
            <li class="nav-item">
                <a class="nav-link" href="{{ route('usuarios.index') }}">Usuários</a>
            </li>
            @endcan
        </ul>

    </div>
</nav>
