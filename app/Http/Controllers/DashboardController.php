<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Gate;

use App\Models\Bebida;

class DashboardController extends Controller
{
    public function index()
    {
        if(Gate::denies('dashboard-view')) {
            abort(403, 'Unauthorized action');
        }

        $data = $this->getViewData();

        return view('dashboard.index', compact('data'));
    }

    public function report() {
        if(Gate::denies('dashboard-report')) {
            abort(403, 'Unauthorized action');
        }

        $data = $this->getViewData();

        $pdf = Pdf::loadView('dashboard.report', compact('data'));

        return $pdf->stream('dashboard_adega.pdf'); 
    }

    private function getViewData() {
        $data = ['valorTotal' => 0, 'litrosTotal' => 0];

        $bebidas = Bebida::where('lista', 'adega')->with('tipo')->get();

        foreach($bebidas as $bebida) {
            $data['valorTotal'] += ($bebida->valor * $bebida->quantidade);
            $data['litrosTotal'] += ($bebida->capacidade * $bebida->quantidade);
        }

        $data['quantidadeTotal'] = $bebidas->sum('quantidade');
        $data['topCaras'] = $bebidas->sortByDesc('valor')->take(5); // testar display de outras quantidades
        $data['tiposQuantidade'] = $bebidas->groupBy('tipo.nome')->map->count();

        return $data;
    }
}
