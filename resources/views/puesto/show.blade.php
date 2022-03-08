@extends('base')
@section('container')
<h4> Puestos creados </h4>
@if(Session::has('message')) 
<div class="alert alert-danger" role="alert">
    {{ session()->get('message') }}
</div>
@endif
<div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="table-light" scope="col"> Nombre </th>
                <th class="table-light" scope="col"> Salario Mínimo </th>
                <th class="table-light" scope="col"> Salario Máximo </th>
            </tr>
        </thead>
        <tbody>
        
                <tr>
                    <td> {{ $puesto->nombre}} </td>
                    <td> {{ $puesto->minimo}} </td>
                    <td> {{ $puesto->maximo}} </td>
                </tr>

        </tbody>
    </table>
    
</div>

@endsection