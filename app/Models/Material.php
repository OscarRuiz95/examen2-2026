<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Material extends Model
{
    use HasFactory;

    protected $table = 'materials';

    protected $primaryKey = 'codigo';

    protected $fillable = [
        'descripcion',
        'ubicacion',
        'idCategoria'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idCategoria', 'idCategoria');
    }

    public function materialUnidades()
    {
        return $this->hasMany(MaterialUnidad::class, 'codigoMaterial', 'codigo');
    }
}