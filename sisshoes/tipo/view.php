<?php require "../_helpers/index.php";
echo siteHeader("Ver Tipo Calçado");
require("../_config/connection.php");
require("../dao/tipo.php");

$tipoDAO = new Tipo();
$product = false;
$error = false;

if (!$_GET || !isset($_GET["id"])) {
    header('Location: index.php?message=Id do tipo de calçado não informado!');
    die();
}

$idTipo = $_GET["id"];

try {
    $tipo = $tipoDAO->getById($idTipo);
} catch (Exception $e) {
    $error = $e->getMessage();
}

 if (!$tipo || $error) {
    header('Location: index.php?message=Erro ao recuperar dados do tipo de calçado!');
    die();
} 


?>

    <section class="container mt-5 mb-5">
        <div class="row mb-3">
            <div class="col">
                <h1>Visualizar Tipos</h1>
            </div>
        </div>

        <div class="mb-3">
            <h3>Tipo</h3>
            <p><?= $tipo["tipo"] ?></p>
        </div>
 
        <a href="index.php" class="btn btn-primary">Voltar</a>
       
    </section>
<?php require "../_partials/footer.php"; ?>