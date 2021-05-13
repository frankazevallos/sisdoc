<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormaRecepcion extends Model
{
    protected $table='tram_recepcion';
    
    public $primaryKey='idrecepcion';
    
    public $timestamps=true;
}
