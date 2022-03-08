<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departamento extends Model
{
    use HasFactory;
     
    const CREATED_AT = 'creacion'; //nombre campo fecha cuando se crea un registro
    const UPDATED_AT = 'editado'; //idem para la edicion
    protected $hidden = ['creacion','editado']; //oculto campos
    protected $fillable = ['nombre','localizacion','idempleadojefe'];// campos que tengan que rellenarse
    
    //relacion con empleado jefe
    public function empleadojefe(){
        return $this->belongsTo('App\Models\empleado','id');
    }
    
    //relacion iddepartamento
    public function departamentos(){
        return $this->hasMany('App\Models\empleado','iddepartamento');
    }
}
