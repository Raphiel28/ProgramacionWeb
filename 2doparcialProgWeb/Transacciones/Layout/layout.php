<?php

class layout{

  public $page;
  public $directory;

function __construct($Ispage){

  $this->page = $Ispage;

  $this->directory = ($this->page) ? "../" : ""; 

}


  public function printHeader(){

   
    
    $header = <<<EOF
    <html lang="es" class="translated-ltr"><head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
       
        <title>Transacciones</title>
    
        
    
        <!-- Bootstrap core CSS -->
    <link href="{$this->directory}assents\css\bootstrap.min.css" rel="stylesheet" type="text/css">
    
    <link href="{$this->directory}assents\css\style.css" rel="stylesheet" type="text/css">
    
    
        
      <body>
        <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Acerca de</font></font></h4>
              <p class="text-muted">Esto es un sistema de transacciones, en el que puedes, registrar, editar y eliminar</p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white">Creador</h4>
              <p class="text-muted">Raphiel Burdier 2019-7870</p>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
          <a href="{$this->directory}index.php" class="navbar-brand d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="mr-2" viewBox="0 0 24 24" focusable="false"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
            <strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Inicio</font></font></strong>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Navegación de palanca">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>
    
EOF;
    
    echo $header;
    }
    
    public function printFooder(){
    
      $footer = <<<EOF
      <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Volver arriba</font></font></a>
        </p>
        <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sistema de transacciones, Hecho por: Raphiel Burdier Hernandez 2019-7870</font></font></p>
        
      </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
         <script src ="{$this->directory}assents\js\bootstrap.min.js"></script>
    
    <div class="goog-te-spinner-pos"><div class="goog-te-spinner-animation"><svg xmlns="http://www.w3.org/2000/svg" class="goog-te-spinner" width="96px" height="96px" viewBox="0 0 66 66"><circle class="goog-te-spinner-path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle></svg></div></div></body></html>
      
EOF;
      
      echo $footer;
      }

}



?>