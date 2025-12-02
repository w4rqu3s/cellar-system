<nav class="navbar navbar-expand-lg navbar-pink shadow-sm">
    <div class="container">

        {{-- HOME ESQUERDA --}}
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            Adega App
        </a>

        {{-- Botão mobile --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navMenu">

            {{-- VAZIO PARA CENTRALIZAR --}}
            <div class="flex-grow-1"></div>

            @can('viewAny', App\Models\Bebida::class)
            {{-- SWITCH CENTRAL --}}
            <div class="mx-auto d-flex">
                <div class="btn-group shadow-sm" role="group">

                    <a href="{{ route('bebidas.index', 'adega') }}"
                        class="btn switch-btn {{ request()->route('lista') == 'adega' ? 'active' : '' }}">
                        Sua Adega
                    </a>

                    <a href="{{ route('bebidas.index', 'desejos') }}"
                        class="btn switch-btn {{ request()->route('lista') == 'desejos' ? 'active' : '' }}">
                        Lista de Desejos
                    </a>

                </div>
            </div>
            @endcan

            {{-- LINKS À DIREITA --}}
            <ul class="navbar-nav ms-auto align-items-center gap-2">

                @can('dashboard-view')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.index') }}">Dashboard</a>
                </li>
                @endcan

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

                {{-- DARK MODE --}}
                <li class="nav-item">
                    <button class="btn btn-sm btn-outline-light rounded-pill px-3" onclick="toggleDarkMode()">
                        <i class="bi bi-moon"></i>
                    </button>
                </li>

                {{-- MENU DO USUÁRIO --}}
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">
                        {{ Auth::user()->name }}
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item text-danger">Sair</button>
                            </form>
                        </li>
                    </ul>
                </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>
