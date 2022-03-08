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
                <th class="table-light" scope="col"> Empleado </th>
                <th class="table-light" scope="col"> E-mail </th>
                <th class="table-light" scope="col"> Teléfono </th>
                <th class="table-light" scope="col"> Fecha de alta </th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($empleados as $empleado)
                <tr>
                    <td> {{ $empleado->nombre}} {{ $empleado->apellidos}}</td>
                    <td> {{ $empleado->email}} </td>
                     <td> {{$empleado->telefono}} </td>
                     <td> {{$empleado->alta}} </td>
                    <td><a href="{{url('empleados/'.$empleado->id)}}" class="btn btn-info"> Mostrar </a></td>
                    <td><a href="{{url('empleados/'.$empleado->id .'/edit')}}" class="btn btn-info"> Editar </a></td>
                    <td>
                        <form action="{{url('empleados/'.$empleado->id)}}" method="post">
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