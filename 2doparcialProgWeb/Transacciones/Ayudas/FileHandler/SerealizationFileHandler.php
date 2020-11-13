<?php

class SerealizationFileHandler implements IFileHandler {

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
        $path = $this->directory . "/" . $this->fileName . ".txt";

        $serializeData = serialize($value);

        $file = fopen($path,"w+");
        fwrite($file,$serializeData);
        fclose($file);
        

    }

    function readFile(){

        $this->createDirectory($this->directory);
        $path = $this->directory . "/" . $this->fileName . ".txt";

        if(file_exists($path)){
            $file = fopen($path,"r");
            $content = fread($file,filesize($path));
            fclose($file);

            return unserialize($content);
        }else {
            return false;
        }
    }

}

?>