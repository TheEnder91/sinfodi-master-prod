<?php

namespace App\Models\Estimulos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Desempeño extends Model
{
    use SoftDeletes;

    public $table = 'sinfodi_desempeños';

    protected $fillable = [
        'resultados', 'f3',
    ];
}
