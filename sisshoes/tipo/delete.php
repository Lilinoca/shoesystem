<?php
require("../_config/connection.php");
require("../dao/tipo.php");
$tipoDAO = new Tipo();
$error = false;

if (!$_GET || !$_GET["id"]) {
    header('Location: index.php?message=Id do tipo de calçado não informado!');
    die();
}

$idTipo = $_GET["id"];

try {
    $result = $tipoDAO->delete($idTipo);
  
} catch (Exception $e) {
    $error = $e->getMessage();
}

$message = ($result && !$error) ? "Tipo excluído com sucesso." : "Erro ao excluir tipo.";
header("Location: index.php?message=$message");
die();
