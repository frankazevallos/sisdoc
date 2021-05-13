<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependencias extends Model
{
    protected $table='tram_dependencia';
    
    protected $primaryKey='iddependencia';
    
    public $timestamps=true;
	
	public function getdependencia(){
		return $this->hasOne('\App\Dependencias', 'iddependencia', 'depe_depende');
	}
}
