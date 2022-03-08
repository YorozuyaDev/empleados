@extends('base')

<h1>  </h1>
@section('container')
<h4>Crear un nuevo puesto </h4>
<br>
@if(Session::has('message')) 
<div class="alert alert-danger" role="alert">
    {{ session()->get('message') }}
</div>
@endif
<form action="{{url('puestos/'.$puesto->id)}}" method='post'>
    @csrf
    @method('put')
    <input value = "{{ old('nombre', $puesto->nombre) }}" id='nombre' name='nombre' type="text" class="form-control" placeholder="Nombre puesto">
    <br>
    <input value = "{{ old('minimo', $puesto->minimo) }}" id='minimo' name='minimo' type="number" class="form-control" placeholder="Salario mínimo">
    <br>
    <input value = "{{ old('maximo', $puesto->maximo) }}" id='maximo' name='maximo' type="number" class="form-control" placeholder="Salario máximo">
    <br>
    <button class="btn btn-success"> Guardar </button>
</form>
@endsection