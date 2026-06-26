<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisicion extends Model
{
    use HasFactory;

    protected $table = 'requisicions';

    protected $primaryKey = 'idRequisicion';

    protected $fillable = [
        'fecha',
        'estado',
        'idUsuario'
    ];

    protected $casts = [
        'fecha' => 'date'
    ];

    public function usuario()
    {
        return $this->belongsTo(
            Usuario::class,
            'idUsuario',
            'idUsuario'
        );
    }

    public function items()
    {
        return $this->hasMany(
            ItemRequisicion::class,
            'idRequisicion',
            'idRequisicion'
        );
    }
}
