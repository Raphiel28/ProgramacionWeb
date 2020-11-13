<?php

class CsvFileHandler implements IFileHandler {

    public $directory;
    public $fileName;

    function __construct($directory,$fileName){

        $this->directory = $directory;
        $this->fileName = $fileName;
    }

    function createDirectory(){

        if(!file_exists($this->directory)){
            mkdir($this->directory,0777,true);
        }

    }

    function saveFile($value){

        $this->createDirectory($this->directory);
        $path = $this->directory . "/" . $this->fileName . ".csv";

        

        $file = fopen($path,"w+");
        fputcsv($file,$value,",",'"');
        fclose($file);
        

    }

    function readFile(){

        $this->createDirectory($this->directory);
        $path = $this->directory . "/" . $this->fileName . ".csv";

        if(file_exists($path)){
            $file = fopen($path,"r");
            $valor = fread($file,filesize($path));
            fclose($file);

            return str_getcsv($valor);
        }else {
            return false;
        }
    }

}

?>