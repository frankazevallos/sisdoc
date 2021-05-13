<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documentos extends Model
{
    protected $table='tram_documento';
    
    protected $primaryKey='iddocumento';
    
    public $timestamps=true;
	
	public function getdependencia(){
		return $this->hasOne('\App\Dependencias', 'iddependencia', 'docu_iddependencia');
	}
	
	public function gettipodocumento(){
		return $this->hasOne('\App\TipoDocumento', 'idtdoc', 'docu_idtipodocumento');
	}
	
	public function gettipoprioridad(){
		return $this->hasOne('\App\TipoPrioridad', 'idprioridad', 'docu_idprioridad');
	}
}

