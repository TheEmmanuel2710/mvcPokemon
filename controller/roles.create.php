<?php
include_once "../model/rol.php";

$rolM=new Modelo\Rol();
$rolM->setNombre($_POST["txtRol"]);
$result= $rolM->create();

echo json_encode($result);

unset($rolM);
?>