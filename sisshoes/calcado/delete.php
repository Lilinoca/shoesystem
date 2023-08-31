<?php  
	require("../_config/connection.php");
    require("../dao/calcado.php");
    $calcadoDAO = new Calcado();
    $error = false;

    if(!$_GET || !$_GET["id"]){
        header('Location: index.php?message=Id do calçado não informado!');
        die();
    }

    $idCalcado = $_GET["id"];

    try {
        $result = $calcadoDAO->delete($idCalcado);
    } catch (Exception $e) {
        $error = $e->getMessage();
    }

    $message = ($result && !$error) ? "Calçado excluído com sucesso." : "Erro ao excluir calçado.";
    header("Location: index.php?message=$message");
    die();

