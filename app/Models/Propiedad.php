<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class propiedad extends Model
{
    use HasFactory;
    protected $fillable = [
        'direccion',
        'id_usuario',
        'estado',
        'precio_propiedad',
        'area',
        'descripcion',
        'fecha_publicacion',
    ];
    protected $guarded = [
        'id_propiedad',
    ];
    protected $primaryKey = 'id_propiedad';
    //protected $dates = ['deleted_at']; , SoftDeletes;
}
