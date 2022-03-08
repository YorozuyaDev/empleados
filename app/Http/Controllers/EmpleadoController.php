<?php

namespace App\Http\Controllers;

use App\Models\empleado;
use Illuminate\Http\Request;
use App\Models\puesto;
use App\Models\departamento;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $empleados = empleado::all();
        $data = [];
        $data['empleados'] = $empleados;
        return view('empleado.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data['puestos'] = puesto::all();

        $data['departamentos'] = departamento::all();
       return view('empleado.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empleado = new empleado($request->all()); //inicializo objeto puesto con todos valores request
        $data = [];
        $empleado->idpuesto = $request->idpuesto;
        $empleado->iddepartamento = $request->iddepartamento;
        try {
            $empleado->save(); 
            $data['message'] = 'se ha guardado correctamente';
        } catch(\Exception $e ) {
            $data['message'] = 'error al guardar' . $e;
            return back()->withInput()->with($data);
        }
        return redirect('empleados')->with($data); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(empleado $empleado)
    {
        $data = [];
        $data['empleado'] = $empleado;
        return view('empleado.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(empleado $empleado)
    {
        $data = [];
        $data['empleado'] = $empleado;
        return view('empleado.edit', $data);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, empleado $empleado)
    {
        $data = [];
        try {
            $puesto->update($request->all()); 
            $data['message'] = 'se ha actualizado correctamente';
        } catch(\Exception $e ) {
            $data['message'] = 'error al actualizar: ';
            return back()->withInput()->with($data);
        }
        return redirect('puestos')->with($data); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(empleado $empleado)
    {
        //
    }
}
