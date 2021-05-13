<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivos extends Model
{
    protected $table = 'tram_archivos';
    
    protected $primaryKey='id_archivos';
    
    public $timestamps=true;
}
