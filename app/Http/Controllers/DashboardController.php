<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Bebida;

class DashboardController extends Controller
{
    public function index()
    {
        $bebidas = Bebida::where('lista', 'adega')->with('tipo')->get();

        $valorTotal = $bebidas->sum('valor');
        $quantidadeTotal = $bebidas->sum('quantidade');
        $litrosTotal = $bebidas->sum('capacidade');

        // TOP 5 mais caras
        $topCaras = $bebidas->sortByDesc('valor')->take(5); // testar display de outras quantidades

        $tiposQuantidade = $bebidas->groupBy('tipo.nome')->map->count();

        $tiposValor = $bebidas->groupBy('tipo.nome')->map(fn ($item) => $item->sum('valor'));

        return view('dashboard.index', compact(
            'valorTotal',
            'quantidadeTotal',
            'litrosTotal',
            'topCaras',
            'tiposQuantidade',
            'tiposValor'
        ));
    }

    public function report() {
        $bebidas = Bebida::where('lista', 'adega')->with('tipo')->get();

        $valorTotal = $bebidas->sum('valor');
        $quantidadeTotal = $bebidas->sum('quantidade');
        $litrosTotal = $bebidas->sum('capacidade');

        // TOP 5 mais caras
        $topCaras = $bebidas->sortByDesc('valor')->take(5); // testar display de outras quantidades

        $tiposQuantidade = $bebidas->groupBy('tipo.nome')->map->count();

        // $tiposValor = $bebidas->groupBy('tipo.nome')->map(fn ($item) => $item->sum('valor'));

        $pdf = Pdf::loadView('dashboard.report', compact(
            'valorTotal',
            'quantidadeTotal',
            'litrosTotal',
            'topCaras',
            'tiposQuantidade',
        ));

        return $pdf->stream('dashboard_adega.pdf'); 
    }
}
