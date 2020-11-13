<?php

class TransaccionServiceFile implements IServiceBase
{

private $utilidades;
public $fileHandler;
public $fileAccion;
public $directory;
public $fileName;
public $fileName2;
public $directory2;

public function __construct($directory = "data", $directory2 = "accion"){
    $this->utilidades = new Utilities();
    $this->directory = $directory;
    $this->fileName = "transacciones";
    $this->directory2 = $directory2;
    $this->fileName2 = "acciones";
    $this->fileHandler = new JsonFileHandler($this->directory, $this->fileName);
    $this->fileAccion = new SerealizationFileAccion($this->directory2,$this->fileName2);
    
}



public function getList(){
    $listadoTransaccionesDecode = $this->fileHandler->readFile();

$listadoTransacciones = array();

if ($listadoTransaccionesDecode == false){

    $this->fileHandler->saveFile($listadoTransacciones);

}else{
        
    foreach($listadoTransaccionesDecode as $elementDecode ){
        $element = new Transacciones();
        $element->set($elementDecode); 

        array_push($listadoTransacciones,$element);
    }
    
}
    return $listadoTransacciones;
    

}
public function getListActions(){
    $listadoAccionesDecode = $this->fileAccion->readFile();

$listadoAcciones = array();

if ($listadoAccionesDecode == false){

    $this->fileAccion->saveFile($listadoAcciones);

}else{
        
    foreach( $listadoAccionesDecode as $elementDecode ){
         

        array_push($listadoAcciones,$elementDecode);
    }
    
}
    return $listadoAcciones;
    

}

public function getId($id){

    $listadoTransacciones = $this->getList();
    $transaccion = $this->utilidades->getProperty($listadoTransacciones,"id",$id)[0];
    return $transaccion;
}


public function add($entity){
    $listadoTransacciones = $this->getList();
    $listadoAcciones = $this->getListActions();
    $transaccionesId = 1;
    $TransaccionFechayHora = date("d-m-Y ,H:i");
    

    if(!empty($listadoTransacciones)){
       $lastTransaccion = $this->utilidades->getLastElement($listadoTransacciones);
       $transaccionesId = $lastTransaccion->id + 1;
    }

    $entity->id = $transaccionesId;
   $entity->fechayHora = $TransaccionFechayHora;
   $transaccionAccion = "Agrego el dia" . date("d-m-Y"). " a las " . date("H:i") . " la transaccion de id " . $transaccionesId;

    

   
    array_push($listadoTransacciones,$entity);
    array_push($listadoAcciones,$transaccionAccion);

    $this->fileHandler->saveFile($listadoTransacciones);
    $this->fileAccion->saveFile($listadoAcciones);

}

public function update($id,$entity){

    $element = $this->getId($id);
    $listadoTransacciones = $this->getList();
    $listadoAcciones = $this->getListActions();

    $elementIndex = $this->utilidades->getIndex(  $listadoTransacciones,"id",$id);

    $transaccionAccion = "Edito el dia" . date("d-m-Y"). " a las " . date("H:i") . " la transaccion de id " . $id;


    $listadoTransacciones[$elementIndex] = $entity;
    array_push($listadoAcciones,$transaccionAccion);

    $this->fileHandler->saveFile($listadoTransacciones);
    $this->fileAccion->saveFile($listadoAcciones);
}

public function delete($id){
    $listadoTransacciones = $this->getList();
    $listadoAcciones = $this->getListActions();
    $transaccionAccion = "Elimino el dia" . date("d-m-Y"). " a las " . date("H:i") . " la transaccion de id " . $id;


    $elementIndex = $this->utilidades->getIndex($listadoTransacciones,"id",$id);

        unset($listadoTransacciones[$elementIndex]);
        array_push($listadoAcciones,$transaccionAccion);

        $listadoTransacciones = array_values($listadoTransacciones);

        $this->fileHandler->saveFile($listadoTransacciones);
        $this->fileAccion->saveFile($listadoAcciones);
}

}

?>