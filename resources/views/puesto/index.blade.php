@extends('base')
@section('container')
@if(Session::has('message')) 
<div class="alert alert-danger" role="alert">
    {{ session()->get('message') }}
</div>
@endif
<h4> Puestos creados </h4>
<div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="table-light" scope="col"> Nombre </th>
                <th class="table-light" scope="col"> Salario Mínimo </th>
                <th class="table-light" scope="col"> Salario Máximo </th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($puestos as $puesto)
                <tr>
                    <td> {{ $puesto->nombre}} </td>
                    <td> {{ $puesto->minimo}} </td>
                    <td> {{ $puesto->maximo}} </td>
                    <td><a href="{{url('puestos/'.$puesto->id)}}" class="btn btn-info"> Mostrar </a></td>
                    <td><a href="{{url('puestos/'.$puesto->id .'/edit')}}" class="btn btn-info"> Editar </a></td>
                    <td>
                        <form action="{{url('puestos/'.$puesto->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <input class="btn btn-danger" value="Eliminar" type="submit">
                        </form>
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>
    
</div>
@endsection