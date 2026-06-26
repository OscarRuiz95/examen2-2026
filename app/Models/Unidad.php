<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    use HasFactory;

    protected $table = 'unidads';

    protected $primaryKey = 'idUnidad';

    protected $fillable = [
        'nombre'
    ];

    public function materialUnidades()
    {
        return $this->hasMany(MaterialUnidad::class, 'idUnidad', 'idUnidad');
    }

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'idUnidad', 'idUnidad');
    }
}