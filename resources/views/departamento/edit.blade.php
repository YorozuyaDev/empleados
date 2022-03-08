@extends('base')

@section('container')
@if(Session::has('message')) 
<div class="alert alert-danger" role="alert">
    {{ session()->get('message') }}
</div>
@endif
<h1> Altas empleados </h1>
<h4>Añadir un nuevo empleado </h4>
<br>
<form action="{{url('empleado/'.$empleado->id)}}" method='post'>
    @csrf
    <input type="text" value = "{{ old('nombre', $empleado->nombre) }}" id='nombre' name='nombre' class="form-control" placeholder="Nombre empleado">
    <br>
    <input type="text" value = "{{ old('apellidos', $empleado->apellidos) }}" id='apellidos' name='apellidos' class="form-control" placeholder="Apellidos empleado">
    <hr>
    <input type="email" value = "{{ old('email', $empleado->email) }}" id='email' name='email' class="form-control" placeholder="e-mail">
    <br>
    <input type="phone" value = "{{ old('telefono', $empleado->telefono) }}" id='telefono' name='telefono' class="form-control" placeholder="Teléfono">
    <hr>
   
    <br>
    <input type="text" value = "{{ old('idpuesto', $empleado->idpuesto) }}" id='idpuesto' name='idpuesto' class="form-control" placeholder="ID Puesto">
    <br>
    <input type="text" value = "{{ old('iddepartamento', $empleado->iddepartamento) }}" id='iddepartamento' name='iddepartamento' class="form-control" placeholder="ID Departamento">
    <br>
    <input type='submit' value="Editar " class="btn btn-success"> </input>
</form>
@endsection