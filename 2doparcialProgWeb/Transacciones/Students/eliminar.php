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




$service = new TransaccionServiceFile();


if(isset($_GET["id"])){

$TransaccionessId = $_GET["id"];

$service->delete($TransaccionessId);

}

header("Location: ../index.php");
exit();

?>