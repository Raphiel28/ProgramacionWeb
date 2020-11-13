<?php 

require_once "Layout\layout.php";
require_once "Ayudas\utilidades.php";
require_once "Service\IServiceBase.php";
require_once "Students\Transacciones.php";
require_once "Ayudas\FileHandler\IFileHandler.php";
require_once "Ayudas\FileHandler\JsonFileHandler.php";
require_once "Ayudas\FileHandler\SerealizationFileHandler.php";
require_once "Ayudas\FileHandler\SerealizationFileAccion.php";
require_once "Ayudas\FileHandler\CsvFileHandler.php";
require_once "Students\TransaccionServiceFile.php";



$layout = new layout(true);
$service = new TransaccionServiceFile("Students/data","Students/accion");
$utilidades = new Utilities();

$listadoTransacciones = $service->getList();





?>

<?php $layout->printHeader();?>

<main role="main">

  

  <div class="album py-5 bg-light">
    <div class="container">
    <div style = "margin-bottom: 1%" class="row">
    
    

    </div>




      <div class="row">
  <?php if(empty($listadoTransacciones)): ?>

<h2> No hay estudiantes registrados, registralos aqui: <a href="Students\agregar.php" class="btn btn-primary my-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Crear Nuevo Estudiante</font></font></a>  </h2>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Estatura</th>
      <th scope="col">Carrera</th>
      <th scope="col">Materia Favorita:</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  </table>
  <?php else: ?>
    <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Fecha y Hora</th>
      <th scope="col">Monto</th>
      <th scope="col">Descripcion</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>

<?php foreach($listadoTransacciones as $transacciones): ?>


  <tbody>
    <tr>
      <th scope="row"><?php echo $transacciones->id ?></th>
      <th scope="row"><?php echo $transacciones->fechayHora ?></th>
      <td><?php echo $transacciones->monto ?></td>
      <td><?php echo $transacciones->descripcion ?></td>
      <td><a href="Students\editar.php?id=<?php echo $transacciones->id ?>" class="card-link btn btn-primary">Editar</a></td>
      <td><a href="Students\eliminar.php?id=<?php echo $transacciones->id ?>" class="card-link btn btn-danger">Eliminar</a></td>
      
    </tr>
   
  </tbody>

<?php endforeach; ?>

</table>
  

  <?php endif; ?>

            </div>
            <a href="Students\agregar.php" class="btn btn-primary my-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Crear Nuevo Estudiante</font></font></a>
            <a download = "transacciones.json" href="Students\data\transacciones.json" class="btn btn-primary my-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Descargar json</font></font></a>
            <a download = "transacciones.txt" href="Students\data\transacciones.txt" class="btn btn-primary my-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Descargar txt</font></font></a>
            <a download = "acciones.txt" href="Students\accion\acciones.txt" class="btn btn-primary my-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Descargar acciones.txt</font></font></a>
          </div>
         
        </div>
    
       
        



      </div>
    </div>
  </div>

</main>

<?php $layout->printFooder();?>