<?php
include_once '../model/rol.php';
$id = $_POST["id"];
$rolM = new Modelo\Rol();
$rolM ->setId($id);
$reponse=$rolM->delete();
echo json_encode($reponse);
unset($rolM);
unset($reponse);
?>