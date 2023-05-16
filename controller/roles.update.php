<?php
include_once '../model/rol.php';
$id = $_POST["id"];
$nombreRol = $_POST["nombreRol"];
$rolM = new Modelo\Rol();
$rolM ->setId($id);
$rolM ->setNombre($nombreRol);
$reponse=$rolM->update();
echo json_encode($reponse);
unset($rolM);
unset($reponse);
?>