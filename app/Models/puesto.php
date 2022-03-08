<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class puesto extends Model
{
    use HasFactory;
    //protected $primaryKey = 'id'; si quiero hacer un campo que no sea el id PK
    //protected $table='puesto' si le quiero cambiar el nombre a la tabla
    //protected $incrementing = false si no quiero que sea autoincremental
    //public $timestamps = false no se imprimen en la base de datos
    protected $attributes =['minimo'=>0]; //default
    protected $fillable = ['nombre','minimo','maximo'];// campos que tengan que rellenarse
    
    //termino la relacion entre puestos y empleados
    public function empleados(){
        return $this->hasMany('App\Models\empleado','idpuesto');
    }
}
