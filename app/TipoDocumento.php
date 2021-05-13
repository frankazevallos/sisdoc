<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $table='tram_tipodocumento';
    
    protected $primaryKey='idtdoc';
    
    public $timestamps=true;
}
