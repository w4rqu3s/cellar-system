<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

use App\Models\Bebida;
use App\Models\Tipo;
use App\Models\User;


class BebidasController extends Controller
{
    public function index(Request $request, string $lista)
    {
        Gate::authorize('viewAny', Bebida::class);
        
        $user = Auth::user();

        $query = Bebida::query()->with('tipo')->where('user_id', $user->id);
        $query->where('lista', $lista);
        
        // FILTROS
        $query = $this->aplicarFiltros($request, $query);
        
        $bebidas = $query->paginate(12)->withQueryString(); // mantém filtros na paginação
        $tipos = Tipo::all();
        
        return view('bebidas.index', compact(['bebidas', 'tipos', 'lista']));
    }

    public function create()
    {
        Gate::authorize('create', Bebida::class);
        
        $tipos = Tipo::all();
        
        return view('bebidas.create', compact('tipos'));
    }
    
    public function store(Request $request)
    {
        Gate::authorize('create', Bebida::class);

        $user = Auth::user();
        
        $bebida = $this->criarBebida($request, $user);

        $bebida->save();

        return redirect()->route('bebidas.show', $bebida->id);
    }
    
    public function show(string $id)
    {
        $bebida = Bebida::find($id);
        
        Gate::authorize('view', $bebida);
        
        if(isset($bebida)) {
            return view('bebidas.show', compact('bebida'));
        }
    }

    public function edit(string $id)
    {
        $bebida = Bebida::find($id);

        Gate::authorize('update', $bebida);

        if(isset($bebida)) {
            $tipos = Tipo::all();
            return view('bebidas.edit', compact(['bebida', 'tipos']));
        } 
    }

    public function update(Request $request, string $id)
    {
        $bebida = Bebida::find($id);
        $user = Auth::user();

        Gate::authorize('update', $bebida);

        if(isset($bebida)) {

            $bebida = $this->criarBebida($request, $user);

            $bebida->save();

            return view('bebidas.show', compact('bebida'));
        }
    }

    public function destroy(string $id)
    {   
        $bebida = Bebida::find($id);

        Gate::authorize('delete', $bebida);

        if(isset($bebida)) {
            $lista = $bebida->lista;
            $bebida->delete();

            if ($bebida->foto) {
                Storage::disk('public')->delete($bebida->foto);
            }  

            return redirect()->route('bebidas.index', $lista);
        }
    }

    public function moverParaAdega($id)
    {
        $bebida = Bebida::findOrFail($id);

        Gate::authorize('moverParaAdega', $bebida);

        if(isset($bebida)) {
            $bebida->lista = 'adega';
            $bebida->save();

            // return redirect()->back()->with('success', 'Bebida movida para a adega.');
            return redirect()->route('bebidas.show', $bebida->id);
        }
    }

    private function aplicarFiltros(Request $request, $query) {

        if ($request->filled('tipo')) {
            $query->where('tipo_id', $request->tipo);
        }
    
        if ($request->filled('ano')) {
            $query->where('ano', $request->ano);
        }
    
        // PESQUISA
        if ($request->filled('search')) {
            $query->where('nome', 'like', '%' . $request->search . '%');
        }
    
        // ORDENAÇÃO
        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'valor_asc':
                    $query->orderBy('valor', 'asc');
                    break;
                case 'valor_desc':
                    $query->orderBy('valor', 'desc');
                    break;
                case 'ano_asc':
                    $query->orderBy('ano', 'asc');
                    break;
                case 'ano_desc':
                    $query->orderBy('ano', 'desc');
                    break;
                default:
                    $query->orderBy('nome');
            }
        } else {
            $query->orderBy('nome');
        }

        return $query;
    }

    private function criarBebida(Request $request, User $user) {
        $bebida = new Bebida();

        $bebida->nome = $request->nome;
        isset($request->desc) ? $bebida->desc = $request->desc : null;
        $bebida->lista = $request->lista;
        $bebida->ano = $request->ano;
        $bebida->quantidade = $request->quantidade;
        $bebida->capacidade = $request->capacidade;
        $bebida->valor = $request->valor;
        $bebida->user_id = $user->id;
        $bebida->tipo_id = $request->tipo;
        
        if($request->hasFile('foto')) {
            $bebida->foto = $this->criarFoto($request);
        }

        return $bebida;
    }

    private function criarFoto(Request $request) {
        $ext = $request->file('foto')->getClientOriginalExtension();
        $name =  Str::uuid() . '.' . $ext;   // gera um nome único para o arquivo
        $request->file('foto')->storeAs('fotos', $name, ['disk' => 'public']);
        return 'fotos/'.$name;
    }   
}
