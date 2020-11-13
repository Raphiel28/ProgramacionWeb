<?php

class Utilities{
    public $carrera = [1 => "Redes", 2 => "Software", 3 => "Multimedia", 4 => "Mecatronica", 5 => "Seguridad Informatica"];

   public function getLastElement ($lista){
        $countList = count($lista);
        $lastElement = $lista[$countList - 1];
    
        return $lastElement;
    }
    
    
    
    public function getProperty($list,$property,$value){
    
    $filter = [];
    
    foreach($list as $item){
        if($item->$property == $value){
            array_push($filter,$item);
        }
    }
    return $filter;
    }

    public function getCokieeTime(){
        return time() + 60*60*24*30; 
    }

    
   public function getIndex($list,$property,$value){
    
        $index = 0;
        
        foreach($list as $key => $item){
            if($item->$property == $value){
               $index = $key; 
            }
        }
        return $index;
        }

   

}


?>