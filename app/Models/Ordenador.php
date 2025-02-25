<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ordenador extends Model
{
    /** @use HasFactory<\Database\Factories\OrdenadorFactory> */
    use HasFactory;

    protected $fillable = ['marca', 'modelo', 'aula_id'];
    protected $table = 'ordenadores';

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }

    public function dispositivos()
    {
        return $this->morphMany(Dispositivo::class, 'colocable');
    }

    public function cambios()
    {
        return $this->hasMany(Cambio::class);
    }
}
