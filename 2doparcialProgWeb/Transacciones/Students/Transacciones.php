<?php 

class Transacciones{

public $id;
public $monto;
public $fechayHora;
public $descripcion;


private $utilidades;

public function __construct(){
    $this->utilidades = new Utilities;
}

public function inicializar_Transaccion($id,$monto,$descripcion,$fechayHora){

    $this->id = $id;
    $this->monto = $monto;
    $this->descripcion = $descripcion;
    $this->fechayHora = $fechayHora;
    
    
    
    }
    
    

public function  set($data){
    foreach($data as $key => $value) $this ->{$key} = $value;
}
        
    



}



?>