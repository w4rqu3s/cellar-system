<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use App\Models\Tipo;

class TiposController extends Controller
{
    public function index()
    {
        $tipos = Tipo::all();

        return view('tipos.index', compact('tipos'));
    }

    public function create()
    {
        return view('tipos.create');
    }

    public function store(Request $request)
    {
        $tipo = new Tipo();

        $tipo->nome = $request->nome;
        $tipo->desc = $request->desc;

        $ext = $request->file('foto')->getClientOriginalExtension();
        $name =  Str::uuid() . '.' . $ext;  
        $request->file('foto')->storeAs('fotos', $name, ['disk' => 'public']);
        $tipo->foto = 'fotos/'.$name;

        $tipo->save();

        return redirect()->route('tipos.show', $tipo->id);
    }

    public function show(string $id)
    {
        $tipo = Tipo::find($id);

        if(isset($tipo)) {
            return view('tipos.show', compact('tipo'));
        }
    }

    public function edit(string $id)
    {
        $tipo = Tipo::find($id);
        
        if(isset($tipo)) {
            return view('tipos.show', compact('tipo'));
        }
    }

    public function update(Request $request, string $id)
    {
        $tipo = Tipo::find($id);

        if(isset($tipo)) {
            $tipo->nome = $request->nome;
            $tipo->desc = $request->desc;

            if($request->hasFile('foto')) {
                $ext = $request->file('foto')->getClientOriginalExtension();
                $name =  Str::uuid() . '.' . $ext;  
                $request->file('foto')->storeAs('fotos', $name, ['disk' => 'public']);
                $tipo->foto = 'fotos/'.$name;
            }
            $tipo->save();

            return redirect()->route('tipos.show', $tipo->id);
        }
    }

    public function destroy(string $id)
    {
        $tipo = Tipo::find($id);

        if(isset($tipo)) {

            if(count($tipo->bebidas) >= 1) {
                return redirect()->route('tipos.index');
            }
            
            Storage::disk('public')->delete($tipo->foto);
            $tipo->delete();

            return redirect()->route('tipos.index');
        }
    }
}
