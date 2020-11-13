<?php 

require_once "..\Layout\layout.php";
require_once "..\Ayudas\utilidades.php";
require_once "Transacciones.php";
require_once "../Service\IServiceBase.php";
require_once "../Ayudas\FileHandler\IFileHandler.php";
require_once "../Ayudas\FileHandler\JsonFileHandler.php";
require_once "../Ayudas\FileHandler\SerealizationFileHandler.php";
require_once "../Ayudas\FileHandler\SerealizationFileAccion.php";
require_once "../Ayudas\FileHandler\CsvFileHandler.php";
require_once "TransaccionServiceFile.php";

$layout = new layout(true);
$service = new TransaccionServiceFile();
$utilidades = new Utilities();

if(isset($_POST["monto"]) && isset($_POST["descripcion"])){


  $newTransaccion = new Transacciones();
  

  $newTransaccion->inicializar_Transaccion(0,$_POST["monto"],$_POST["descripcion"],"");

  $service->add($newTransaccion);




header("Location: ../index.php");
exit();

}

?>

<?php $layout->printHeader();?>

<main role = "main">

<div style = "margin-top: 2%" class = "row">
<div class = "col-md-3"></div>
<div class = "col-md-6">
<div class="card">
  <div class="card-header">
    Registrar Nueva Transaccion
  </div>
  <div class="card-body">

  <form action ="agregar.php" method = "POST">
  <div class="form-group">
    <label for="monto">Monto</label>
    <input type="text" class="form-control" id="monto" name = "monto">
  </div>

  <div class="form-group">
    <label for="apellido">Descripcion</label>
    <textarea class="form-control" id="descripcion" name = "descripcion" rows="3"></textarea>
  </div>



 <button type = "submit" class = "btn btn-success" > Agregar Transaccion </button>
 
</form>

  </div>
</div>
</div>
<div class = "col-md-3"></div>
</div>



</main>
<?php $layout->printFooder();?>
