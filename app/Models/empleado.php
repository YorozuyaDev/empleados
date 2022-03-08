<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleado extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['nombre','apellidos','telefono','email','alta'];// campos que tengan que rellenarse
    
    //relacion con puesto
    public function puestos(){
        return $this->belongsTo('App\Models\puesto','id');
    }
    
    //relacion con departamento
    public function departamentos(){
        return $this->belongsTo('App\Models\departamento','id');
    }
    
    //  public function empleadojefe(){
    //     return $this->belongsTo('App\Models\departamento','idempleadojefe');
    // }
}
