<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Bebida;
use App\Models\Tipo;


class BebidasController extends Controller
{
    public function index(string $lista)
    {
        $bebidas = Bebida::where('lista', $lista)->get();
        
        return view('bebidas.index', compact(['bebidas', 'lista']));
    }

    public function create()
    {
        $tipos = Tipo::all();

        return view('bebidas.create', compact('tipos'));
    }

    public function store(Request $request)
    {
        $bebida = new Bebida();

        $bebida->nome = $request->nome;
        isset($request->desc) ? $bebida->desc = $request->desc : null;
        $bebida->lista = $request->lista;
        $bebida->ano = $request->ano;
        $bebida->quantidade = $request->quantidade;
        $bebida->capacidade = $request->capacidade;
        $bebida->valor = $request->valor;
        $bebida->user_id = 1;
        $bebida->tipo_id = $request->tipo;

        if($request->hasFile('foto')) {
            $ext = $request->file('foto')->getClientOriginalExtension();
            $name =  Str::uuid() . '.' . $ext;   // gera um nome único para o arquivo
            $request->file('foto')->storeAs('fotos', $name, ['disk' => 'public']);
            $bebida->foto = 'fotos/'.$name;
        }

        $bebida->save();

        return redirect()->route('bebidas.show', $bebida->id);
    }

    public function show(string $id)
    {
        $bebida = Bebida::find($id);

        return view('bebidas.show', compact('bebida'));
    }

    public function edit(string $id)
    {
        $bebida = Bebida::find($id);

        if(isset($bebida)) {
            $tipos = Tipo::all();
            return view('bebidas.edit', compact(['bebida', 'tipos']));
        } 
    }

    public function update(Request $request, string $id)
    {
        $bebida = Bebida::find($id);

        if(isset($bebida)) {
            $bebida->nome = $request->nome;
            isset($request->desc) ? $bebida->desc = $request->desc : null;
            $bebida->lista = $request->lista;
            $bebida->ano = $request->ano;
            $bebida->quantidade = $request->quantidade;
            $bebida->capacidade = $request->capacidade;
            $bebida->valor = $request->valor;
            $bebida->user_id = 1;
            $bebida->tipo_id = $request->tipo;

            if($request->hasFile('foto')) {
                $ext = $request->file('foto')->getClientOriginalExtension();
                $name =  Str::uuid() . '.' . $ext;   // gera um nome único para o arquivo
                $request->file('foto')->storeAs('fotos', $name, ['disk' => 'public']);
                $bebida->foto = 'fotos/'.$name;
            }

            $bebida->save();

            return view('bebidas.show', compact('bebida'));
        }
    }

    public function destroy(string $id)
    {
        $bebida = Bebida::find($id);

        if(isset($bebida)) {
            $lista = $bebida->lista;
            $bebida->delete();

            if ($bebida->foto) {
                Storage::disk('public')->delete($bebida->foto);
            }  

            return redirect()->route('bebidas.index', $lista);
        }
    }
}
