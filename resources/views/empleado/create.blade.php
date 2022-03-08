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
<form action="{{url('empleados')}}" method='post'>
    @csrf
    <input type="text" value = "{{ old('nombre') }}" id='nombre' name='nombre' class="form-control" placeholder="Nombre empleado">
    <br>
    <input type="text" value = "{{ old('apellidos') }}" id='apellidos' name='apellidos' class="form-control" placeholder="Apellidos empleado">
    <hr>
    <input type="email" value = "{{ old('email') }}" id='email' name='email' class="form-control" placeholder="e-mail">
    <br>
    <input type="phone" value = "{{ old('telefono') }}" id='telefono' name='telefono' class="form-control" placeholder="Teléfono">
    <hr>
    <label> Fecha de contratación </label>
    <input type="date" value = "{{ old('alta') }}" id='alta' name='alta' class="form-control">
    <br>
    <select id='idpuesto' name='idpuesto'>
    @foreach($puestos as $puesto)
    <option  value = "{{ $puesto->id }}" class="form-control" >{{$puesto->nombre}}</option>
    @endforeach
    </select>
    <br>
    <select id='iddepartamento' name='iddepartamento'>
    @foreach($departamentos as $departamento)
    <option  value = "{{ $departamento->id }}" class="form-control" >{{ $departamento->nombre }}</option>
    @endforeach
    </select>
        <br>

    <input type='submit' value="Dar de alta " class="btn btn-success"> </input>
</form>
@endsection