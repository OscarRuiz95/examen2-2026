<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialUnidad extends Model
{
    use HasFactory;

    protected $table = 'material_unidads';

    protected $primaryKey = 'idMaterialUnidad';

    protected $fillable = [
        'cantidad',
        'codigoMaterial',
        'idUnidad',
        'codigoPresupuesto'
    ];

    public function material()
    {
        return $this->belongsTo(Material::class, 'codigoMaterial', 'codigo');
    }

    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'idUnidad', 'idUnidad');
    }

    public function presupuesto()
    {
        return $this->belongsTo(Presupuesto::class, 'codigoPresupuesto', 'codigoPresupuesto');
    }
}