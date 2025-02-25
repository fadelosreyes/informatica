<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Cambio;
use App\Models\Ordenador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdenadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ordenadores.index', [
            'ordenadores' => Ordenador::orderBy('created_at', 'desc')->paginate(2)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ordenadores.create',);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'marca' => 'required',
            'modelo' => 'required|string|max:255',
            'aula' => 'required|string|max:255',
        ]);

        DB::beginTransaction();

        $aula = Aula::where('nombre', $validated['aula'])->first();

        //if (!$aula) {
        //    $aula = Aula::create([
        //        'nombre' => $validated['aula']
        //    ]);
        //}

        Ordenador::create([
            'marca' => $validated['marca'],
            'modelo' => $validated['modelo'],
            'aula_id' => $aula->id
        ]);

        //$ordenador->aula()->associate($aula);

        DB::commit();
        session()->flash('exito', 'Ordenador creado correctamente.');
        return redirect()->route('ordenadores.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Ordenador $ordenador)
    {
        return view('ordenadores.show', [
            'ordenador'  => $ordenador,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ordenador $ordenador)
    {
        return view('ordenadores.edit', [
            'ordenador'  => $ordenador,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ordenador $ordenador)
    {
        $validated = $request->validate([
            'marca' => 'required',
            'modelo' => 'required|string|max:255',
            'aula' => 'required|string|max:255',
        ]);

        DB::beginTransaction();

        $origen = $ordenador->aula->id;

        $aula = Aula::where('nombre', $validated['aula'])->first();

        $ordenador->update([
            'marca' => $validated['marca'],
            'modelo' => $validated['modelo'],
            'aula_id' => $aula->id
        ]);

        if ($origen !== $ordenador->aula_id) {
            Cambio::create([
                'ordenador_id' => $ordenador->id,
                'origen_id' => $origen,
                'destino_id' => $ordenador->aula_id,
            ]);
        }

        DB::commit();

        session()->flash('exito', 'Ordenador modificado correctamente.');
        return redirect()->route('ordenadores.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ordenador $ordenador)
    {
        $ordenador->delete();
        return redirect()->route('ordenadores.index');
    }
}
