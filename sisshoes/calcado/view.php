<?php require "../_helpers/index.php";
echo siteHeader("Ver Calçado");
require("../_config/connection.php");

require("../dao/calcado.php");

$calcadoDAO = new Calcado();

$calcado = false;
$error = false;

if (!$_GET || !$_GET["id"]) {
    header('Location: index.php?message=Id do calçado não informado!');
    die();
}

$idCalcado = $_GET["id"];

try {
    $calcado = $calcadoDAO->getById($idCalcado);
} catch (Exception $e) {
    echo "Id: ".$idCalcado."<br>";
    $error = $e->getMessage();
}

if (!$calcado || $error) {
    header('Location: index.php?message=Erro ao recuperar dados do calçado!');
    die();
}


?>


    <section class="container mt-5 mb-5">
        <div class="row mb-3">
            <div class="col">
                <h1>Visualizar Calçado</h1>
            </div>
        </div>

        <div class="mb-3">
            <h3>Tipo</h3>
            <p><?= $calcado["tipo"] ?></p>
        </div>
        
        <div class="mb-3">
            <h3>Modelo</h3>
            <p><?= $calcado["modelo"] ?></p>
        </div>
        
        <div class="mb-3">
            <h3>Material</h3>
            <p><?= $calcado["material"] ?></p>
        </div>
        <a href="index.php" class="btn btn-primary">Voltar</a>
    </section>

<?php require "../_partials/footer.php"; ?>