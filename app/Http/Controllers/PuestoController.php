<?php

namespace App\Http\Controllers;
use DB;
use App\Models\puesto;
use App\Models\empleado;
use Illuminate\Http\Request;

class PuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puestos = puesto::all();
        $data = [];
        $data['puestos'] = $puestos;
        return view('puesto.index')->with($data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('puesto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $puesto = new puesto($request->all()); //inicializo objeto puesto con todos valores request
        $data = [];

        try {
            $puesto->save(); 
            $data['message'] = 'se ha guardado correctamente';
        } catch(\Exception $e ) {
            $data['message'] = 'error al guardar';
            return back()->withInput()->with($data);
        }
        return redirect('puestos')->with($data); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function show(puesto $puesto)
    {
        $data = [];
        $data['puesto'] = $puesto;
        return view('puesto.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function edit(puesto $puesto)
    {
        $data = [];
        $data['puesto'] = $puesto;
        return view('puesto.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, puesto $puesto)
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
     * @param  \App\Models\puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function destroy(puesto $puesto)
    {
        $data=[];
        $empleados = empleado::all();
        DB::beginTransaction();
        try {
            foreach($empleados as $empleado){
                if($empleado->idpuesto==$puesto->id){
                    $idpuesto = $puesto->id;
                   DB::table('empleados')->where("empleados.idpuesto", '=', $idpuesto)->update(['empleados.idpuesto'=>null]);
                }
            }    
            
        } catch (\Exception $e) {
            DB::rollBack();
            $data['message'] = 'No se han podido eliminar las dependencias del puesto';
            return back()->with($data);
        }
        try {
         $puesto->delete();
        } catch(\Exception $e) {
            DB::rollBack();
            $data['message'] = 'No se han podido eliminar el puesto';
            return back()->with($data);
        }
        DB::commit();
        return redirect('puestos')->with($data);
        
    }
}
