<?php

namespace App\Http\Controllers;
use App\Models\empleado;

use App\Models\departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['empleados'] = empleado::all();
        return view('departamento.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $departamento = new departamento($request->all()); //inicializo objeto puesto con todos valores request
        $data = [];
        try {
            $departamento->save(); 
            $data['message'] = 'se ha guardado correctamente';
        } catch(\Exception $e ) {
            $data['message'] = 'error al guardar: ' . $e;
            return back()->withInput()->with($data);
        }
        return redirect('departamentos')->with($data); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function show(departamento $departamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function edit(departamento $departamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, departamento $departamento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(departamento $departamento)
    {
        //
    }
}
