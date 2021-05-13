<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivadores extends Model
{
    protected $table='tram_archivador';
    
    protected $primaryKey='idarch';
    
    public $timestamps=true;
    
    public function getadmin(){
        return $this->belongsTo('\App\Admin', 'arch_idadmin', 'idadmin');
    }
    
    public function getusuarioa(){
        return $this->belongsTo('\App\Admin', 'arch_idusuarioa', 'idadmin');
    }
	
    public function getdependencia(){
        return $this->belongsTo('\App\Dependencias', 'arch_iddependencia', 'iddependencia');
    }
}
