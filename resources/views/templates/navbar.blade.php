<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container-fluid">

        <a class="navbar-brand" href="{{ url('/') }}">
            Adega App
        </a>

        <button 
            class="navbar-toggler" 
            type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#navbarNav"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('bebidas.index', 'adega') }}">
                        Sua Adega
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('bebidas.index', 'desejos') }}">
                        Lista de Desejos
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tipos.index') }}">
                        Tipos
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('usuarios.index') }}">
                        Usuários
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>