<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Relatório da Adega</title>
    <style>

        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10pt;
            margin: 1cm 0.5cm;
            color: #000;
        }

        .texto-marca-dagua {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 7em;
            color: #888;
            opacity: 0.1;
            pointer-events: none;
            white-space: nowrap;
            z-index: 0;
        }

        .texto-restrito-cima, .texto-restrito-baixo {
            position: absolute;
            border: 1px solid #999;
            color: #999;
            font-size: 14px;
            font-weight: bolder;
            text-align: center;
            padding: 2px 8px;
            width: 100%;
        }

        .texto-restrito-cima { top: 0; }
        .texto-restrito-baixo { bottom: 0; }

        .header {
            text-align: center;
            line-height: 1.2;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }
        .header .main-title { font-size: 11pt; }

        .info-table, .identification-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 0.5rem;
            margin-bottom: 1rem;
        }
        .info-table td, .identification-table td {
            border: 1px solid black;
            padding: 4px 6px;
            vertical-align: top;
        }
        .info-table .label {
            font-weight: bold;
            width: 150px;
            text-transform: uppercase;
        }

        .section-title {
            font-weight: bold;
            text-transform: uppercase;
            background-color: #f0f0f0;
            padding: 4px 6px;
            margin-top: 1rem;
        }

        .photo-cell {
            width: 130px;
            font-weight: bold;
            text-align: center;
            vertical-align: middle;
        }

        .photo-cell img {
            width: 100px;
            height: auto;
            border-radius: 8px;
        }

        table th, table td {
            font-size: 9pt;
        }

    </style>
</head>
<body>

<div class="texto-marca-dagua">ADEGA APP</div>
<div class="texto-restrito-cima">DOCUMENTO GERADO PELO ADEGA APP</div>

<div class="header">
    <div class="main-title">RELATÓRIO DA ADEGA</div>
</div>

<hr>

{{-- Métricas principais --}}
<div class="section-title">Métricas principais</div>
<table class="info-table">
    <tbody>
        <tr>
            <td class="label">Valor Total</td>
            <td>R$ {{ number_format($valorTotal, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td class="label">Quantidade de Garrafas</td>
            <td>{{ $quantidadeTotal }}</td>
        </tr>
        <tr>
            <td class="label">Capacidade Total</td>
            <td>{{ number_format($litrosTotal, 2, ',', '.') }} L</td>
        </tr>
    </tbody>
</table>

{{-- Ranking das bebidas mais caras --}}
<div class="section-title">Bebidas Mais Caras</div>
<table class="info-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Tipo</th>
            <th>Valor (R$)</th>
            <th>Foto</th>
        </tr>
    </thead>
    <tbody>
        @php $posicao = 1; @endphp
        @foreach ($topCaras as $bebida)
        <tr>
            <td style="text-align:center;">{{ $posicao }}</td>
            <td>{{ $bebida->nome }}</td>
            <td>{{ $bebida->tipo->nome }}</td>
            <td style="text-align:right;">{{ number_format($bebida->valor, 2, ',', '.') }}</td>
            <td class="photo-cell">
                @if($bebida->foto)
                    <img src="{{ public_path('storage/' . $bebida->foto) }}">
                @else
                    -
                @endif
            </td>
        </tr>
        @php $posicao++; @endphp
        @endforeach
    </tbody>
</table>

{{-- Quantidade por tipo --}}
<div class="section-title">Quantidade por Tipo</div>
<table class="info-table">
    <thead>
        <tr>
            <th>Tipo</th>
            <th>Quantidade</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tiposQuantidade as $tipo => $qtd)
        <tr>
            <td>{{ $tipo }}</td>
            <td style="text-align:right;">{{ $qtd }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="texto-restrito-baixo">DOCUMENTO GERADO PELO ADEGA APP</div>

</body>
</html>
