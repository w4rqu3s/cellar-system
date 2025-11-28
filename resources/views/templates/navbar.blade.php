<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4 position-relative">
    <div class="container-fluid">

        {{-- Bloco esquerdo: Home --}}
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>
        </ul>

        {{-- Switch centralizado --}}
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

        {{-- Bloco direito: outros links --}}
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('tipos.index') }}">Tipos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('usuarios.index') }}">Usuários</a>
            </li>
        </ul>

    </div>
</nav>
