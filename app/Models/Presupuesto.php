<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    use HasFactory;

    protected $table = 'presupuestos';

    protected $primaryKey = 'codigoPresupuesto';

    protected $fillable = [
        'nombrePresupuesto'
    ];

    public function materialUnidades()
    {
        return $this->hasMany(
            MaterialUnidad::class,
            'codigoPresupuesto',
            'codigoPresupuesto'
        );
    }
}