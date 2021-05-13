<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operacion extends Model
{
    protected $table='tram_operacion';
    
    protected $primaryKey='idoperacion';
    
    public $timestamps=true;
	
	public function getdocumento(){
		return $this->belongsTo('\App\Documentos', 'oper_iddocumento', 'iddocumento');
	}
	
	public function getarchivador(){
		return $this->hasOne('\App\Archivadores', 'idarch', 'oper_idarchivador');
	}
	
	public function getdependencia(){
		return $this->hasOne('\App\Dependencias', 'iddependencia', 'oper_iddependencia');
	}
	
	public function getdepdestino(){
		return $this->hasOne('\App\Dependencias', 'iddependencia', 'oper_depeid_d');
	}
	
	public function getusuario(){
		return $this->hasOne('\App\Admin', 'idadmin', 'oper_idadmin');
	}
	
	public function getusudestino(){
		return $this->hasOne('\App\Admin', 'idadmin', 'oper_usuid_d');
	}	
}
