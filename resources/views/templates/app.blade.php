<!DOCTYPE html>
<html lang="pt-BR">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Adega App')</title>

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    {{-- Ícones (opcional mas recomendado) --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css">

    {{-- Tema customizado --}}
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">

</head>
<body class="bg-light" id="body">

    @include('templates.navbar')

    <main class="py-4">
        @yield('content')
    </main>

    {{-- Dark Mode Script --}}
    <script>
        const body = document.getElementById('body');

        function toggleDarkMode() {
            body.classList.toggle('dark-mode');
            localStorage.setItem('dark-mode', body.classList.contains('dark-mode'));
        }

        if (localStorage.getItem('dark-mode') === 'true') {
            body.classList.add('dark-mode');
        }
    </script>

</body>
</html>
