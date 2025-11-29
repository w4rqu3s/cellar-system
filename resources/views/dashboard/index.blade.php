@extends('templates.app')

@section('title', 'Dashboard da Adega')

@section('content')

    {{-- Ícones --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-4 fw-bold">🎛️ Dashboard da Adega</h1>
            <a href="{{ route('dashboard.report') }}" class="btn btn-danger"><i class="bi bi-file-earmark-pdf-fill"></i></a>
        </div>

        {{-- Métricas principais --}}
        <div class="row g-4 mb-4">

            <div class="col-md-4">
                <div class="card shadow-lg rounded-4 border-0 p-4"
                    style="background: linear-gradient(135deg, #355C7D, #6C5B7B, #C06C84); color:white">
                    <h5 class="mb-2"><i class="bi bi-cash-coin"></i> Valor Total</h5>
                    <h2 class="fw-bold">R$ {{ number_format($data['valorTotal'], 2, ',', '.') }}</h2>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-lg rounded-4 border-0 p-4"
                    style="background: linear-gradient(135deg, #11998e, #38ef7d); color:white">
                    <h5 class="mb-2"><i class="bi bi-collection"></i> Garrafas</h5>
                    <h2 class="fw-bold">{{ $data['quantidadeTotal'] }}</h2>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-lg rounded-4 border-0 p-4"
                    style="background: linear-gradient(135deg, #396afc, #2948ff); color:white">
                    <h5 class="mb-2"><i class="bi bi-droplet-half"></i> Capacidade Total</h5>
                    <h2 class="fw-bold">{{ number_format($data['litrosTotal'], 2, ',', '.') }} L</h2>
                </div>
            </div>

        </div>

        {{-- Gráficos + Ranking --}}
        <div class="row g-4">

            {{-- Gráfico Quantidade --}}
            <div class="col-md-4">
                <div class="card shadow-sm rounded-4 p-4 border-0">
                    <h5 class="text-center fw-bold mb-3">🍷 Quantidade por Tipo</h5>
                    <canvas id="graficoTiposQuantidade"></canvas>
                </div>
            </div>

            {{-- Ranking de bebidas mais caras --}}
            <div class="col-md-6">
                <h3 class="fw-bold mb-3">🏆 Bebidas Mais Caras</h3>

                <div class="row g-3">

                    @php $posicao = 1; @endphp
                    @foreach ($data['topCaras'] as $bebida)
                        <div class="col-md-4">
                            <div class="card shadow-sm rounded-4 border-0 p-3 d-flex flex-row align-items-center clickable-card"
                                style="background: #f8f9fa" data-url="{{ route('bebidas.show', $bebida->id) }}">

                                <div class="me-3 text-center"
                                    style="width:50px; height:50px; background:#e9ecef;
                                    border-radius:12px; border:2px solid #ced4da;
                                    display:flex; align-items:center; justify-content:center;
                                    font-weight:bold; font-size:1.2rem;">
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

    <style>
        .clickable-card {
            cursor: pointer;
            transition: background 0.2s, transform 0.1s;
        }

        .clickable-card:hover {
            background-color: #f0f0f0;
            transform: translateY(-2px);
        }
    </style>

    <script>
        document.querySelectorAll('.clickable-card').forEach(card => {
            card.addEventListener('click', () => {
                window.location.href = card.dataset.url;
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const tiposQuantidade = @json($data['tiposQuantidade']);

        new Chart(document.getElementById('graficoTiposQuantidade'), {
            type: 'pie',
            data: {
                labels: Object.keys(tiposQuantidade),
                datasets: [{
                    data: Object.values(tiposQuantidade),
                    backgroundColor: [
                        '#355C7D', '#6C5B7B', '#C06C84', '#11998e', '#396afc'
                    ]
                }]
            }
        });
    </script>

@endsection
