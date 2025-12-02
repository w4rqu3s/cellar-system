@extends('templates.app')

@section('title', 'Dashboard da Adega')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">🎛️ Dashboard da Adega</h1>

        @can('dashboard-report')
        <a href="{{ route('dashboard.report') }}" class="btn btn-danger">
            <i class="bi bi-file-earmark-pdf-fill"></i>
        </a>
        @endcan
    </div>


    {{-- MÉTRICAS PRINCIPAIS --}}
    <div class="row g-4 mb-4">

        <div class="col-md-4">
            <div class="card shadow-lg rounded-4 border-0 p-4 bg-gradient-pink text-white">
                <h6 class="mb-1"><i class="bi bi-cash-coin"></i> Valor Total</h6>
                <h2 class="fw-bold">R$ {{ number_format($data['valorTotal'], 2, ',', '.') }}</h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-lg rounded-4 border-0 p-4 bg-gradient-green text-white">
                <h6 class="mb-1"><i class="bi bi-collection"></i> Garrafas</h6>
                <h2 class="fw-bold">{{ $data['quantidadeTotal'] }}</h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-lg rounded-4 border-0 p-4 bg-gradient-blue text-white">
                <h6 class="mb-1"><i class="bi bi-droplet-half"></i> Capacidade Total</h6>
                <h2 class="fw-bold">{{ number_format($data['litrosTotal'], 2, ',', '.') }} L</h2>
            </div>
        </div>

    </div>


    {{-- GRÁFICO + RANKING --}}
    <div class="row g-4">

        {{-- GRÁFICO --}}
        <div class="col-md-4">
            <div class="card shadow-sm rounded-4 p-4 border-0">
                <h5 class="text-center fw-bold mb-3">🍷 Quantidade por Tipo</h5>
                <canvas id="graficoTiposQuantidade"></canvas>
            </div>
        </div>


        {{-- RANKING --}}
        <div class="col-md-8">
            <h3 class="fw-bold mb-3">🏆 Bebidas Mais Caras</h3>

            <div class="row g-3">

                @php $posicao = 1; @endphp
                @foreach ($data['topCaras'] as $bebida)

                <div class="col-md-4">
                    <div class="card clickable-card shadow-sm rounded-4 border-0 p-3 d-flex flex-row align-items-center"
                         style="background:#fce4ec;"
                         data-url="{{ route('bebidas.show', $bebida->id) }}">

                        <div class="rank-badge me-3">
                            {{ $posicao }}
                        </div>

                        <div>
                            <h6 class="fw-bold mb-1">{{ $bebida->nome }}</h6>
                            <div class="text-muted small">
                                <i class="bi bi-cash"></i>
                                R$ {{ number_format($bebida->valor, 2, ',', '.') }}
                            </div>
                            <div class="text-muted small">
                                <i class="bi bi-tag"></i>
                                {{ $bebida->tipo->nome }}
                            </div>
                        </div>

                    </div>
                </div>

                @php $posicao++; @endphp
                @endforeach

            </div>
        </div>
    </div>

</div>


{{-- ESTILOS PADRONIZADOS --}}
<style>
    :root {
        --rosa: #e91e63;
        --rosa-claro: #f8bbd0;
        --rosa-clarissimo: #fce4ec;

        --dark-bg: #1c1c1c;
        --dark-card: #2a2a2a;
        --dark-text: #f5f5f5;
    }

    /* Gradientes principais */
    .bg-gradient-pink {
        background: linear-gradient(135deg, #ec407a, #d81b60, #e91e63);
    }
    .bg-gradient-green {
        background: linear-gradient(135deg, #11998e, #38ef7d);
    }
    .bg-gradient-blue {
        background: linear-gradient(135deg, #396afc, #2948ff);
    }

    /* Ranking */
    .rank-badge {
        width: 50px;
        height: 50px;
        background: var(--rosa-claro);
        border-radius: 12px;
        border: 2px solid var(--rosa);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 1.2rem;
    }

    /* Card clicável */
    .clickable-card {
        cursor: pointer;
        transition: background 0.2s, transform 0.1s;
        border-left: 5px solid var(--rosa);
    }

    .clickable-card:hover {
        background: var(--rosa-clarissimo) !important;
        transform: translateY(-3px);
    }


    /* MODO ESCURO */
    body.dark {
        background: var(--dark-bg) !important;
        color: var(--dark-text) !important;
    }

    body.dark .card {
        background: var(--dark-card) !important;
        color: var(--dark-text) !important;
    }

    body.dark .clickable-card {
        border-left-color: var(--rosa);
    }

    body.dark .clickable-card:hover {
        background: #3a2a2a !important;
    }
</style>


{{-- SCRIPT PARA CARDS CLICÁVEIS --}}
<script>
    document.querySelectorAll('.clickable-card').forEach(card => {
        card.addEventListener('click', () => {
            window.location.href = card.dataset.url;
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

{{-- GRÁFICO --}}
<script>
    const tiposQuantidade = @json($data['tiposQuantidade']);

    new Chart(document.getElementById('graficoTiposQuantidade'), {
        type: 'pie',
        data: {
            labels: Object.keys(tiposQuantidade),
            datasets: [{
                data: Object.values(tiposQuantidade),
                backgroundColor: [
                    '#e91e63', '#f06292', '#ce93d8', '#ba68c8', '#ab47bc'
                ]
            }]
        },
        options: {
            plugins: {
                legend: { labels: { color: document.body.classList.contains('dark') ? '#fff' : '#000' } }
            }
        }
    });
</script>

@endsection
