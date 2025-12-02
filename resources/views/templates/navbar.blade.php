<nav class="navbar navbar-expand-lg navbar-pink shadow-sm">
    <div class="container">

        {{-- HOME ESQUERDA --}}
        <a class="navbar-brand fw-bold" href="{{ url('/home') }}">
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

                {{-- MENU DO USUÁRIO --}}
                @auth
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} {{-- Display the logged-in user's name --}}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            {{-- Example profile link --}}
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                Profile
                            </a>

                            {{-- Logout form (Laravel standard practice for POST logout) --}}
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>
