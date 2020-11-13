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

if(isset($_GET["id"])) {

$TransaccionId = $_GET["id"];

$element = $service->getId($TransaccionId);



  if(isset($_POST["monto"]) && isset($_POST["descripcion"]) ){
    

    $updateTransaccion = new Transacciones();

    $TransaccionFechayHora = date("d-m-Y, H:i");

    $updateTransaccion->inicializar_Transaccion($TransaccionId,$_POST["monto"],$_POST["descripcion"],$TransaccionFechayHora);

$service->update($TransaccionId,$updateTransaccion);



header("Location: ../index.php");
exit();

}

}else {
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
    Actualizar Transaccion
  </div>
  <div class="card-body">

  <form action ="editar.php?id=<?php echo $element->id ?>" method = "POST">
  <div class="form-group">
    <label for="monto">Monto</label>
    <input value = "<?php echo $element->monto; ?>" type="text" class="form-control" id="monto" name = "monto">
  </div>

  <div class="form-group">
    <label for="descripcion">Descripcion</label>
    <textarea class="form-control" id="descripcion" name = "descripcion" rows="3"><?php echo $element->descripcion ?></textarea>
  </div>

  
 <button type = "submit" class = "btn btn-success" > Guardar </button>
 
</form>

  </div>
</div>
</div>
<div class = "col-md-3"></div>
</div>



</main>
<?php $layout->printFooder();?>
