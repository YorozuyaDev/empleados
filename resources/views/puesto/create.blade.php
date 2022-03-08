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
<form action="{{url('puestos')}}" method='post'>
    @csrf
    <input value = "{{ old('nombre') }}" id='nombre' name='nombre' type="text" class="form-control" placeholder="Nombre puesto">
    <br>
    <input value = "{{ old('minimo') }}" id='minimo' name='minimo' type="number" class="form-control" placeholder="Salario mínimo">
    <br>
    <input value = "{{ old('maximo') }}" id='maximo' name='maximo' type="number" class="form-control" placeholder="Salario máximo">
    <br>
    <button class="btn btn-success"> Guardar </button>
</form>
@endsection