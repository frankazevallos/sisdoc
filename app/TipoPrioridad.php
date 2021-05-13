<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPrioridad extends Model
{
    protected $table='tram_prioridad';
    
    protected $primaryKey='idprioridad';
    
    public $timestamps=true;
}
