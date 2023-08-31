<?php require "../_helpers/index.php";
echo siteHeader("Editar Tipo");
require("../_config/connection.php");
require("../dao/tipo.php");
$tipoDAO = new Tipo();

$tipo = false;
$error = false;

if (!$_GET || !isset($_GET["id"])) {
    header('Location: index.php?message=Id do tipo não informado!');
    die();
}

$idTipo = $_GET["id"];
$tipo = $tipoDAO->getById($idTipo);

if (!$tipo || $error) {
    header('Location: index.php?message=Erro ao recuperar dados do tipo de calçado!');
    die();
}

$updateError = false;
$rs = false;
if ($_POST) {
    try {
        $tipo = $_POST["p_tipo"];        
        $rs = $tipoDAO->update($idTipo, $tipo);
        
        if ($rs) {
            header('Location: index.php?message=Tipo de calçado atualizado com sucesso!');
            die();
        }
    } catch (Exception $e) {
        $updateError = $e->getMessage();
    }
}

?>

<body>



    <section class="container mt-5 mb-5">

        <?php if ($_POST && (!$rs || $upadeError)) : ?>
            <p>
                Erro ao alterar o tipo de calçado.
                <?= $error ? $error : "Erro desconhecido." ?>
            </p>
        <?php endif; ?>

        <div class="row mb-3">
            <div class="col">
                <h1>Editar tipo</h1>
            </div>
        </div>

        <form action="" method="post">

            <div class="mb-3">
                <label for="p_nome" class="form-label">Tipo: </label>
                <input type="text" class="form-control" id="p_tipo" name="p_tipo" placeholder="Tipo do calçado" value="<?= $tipo["tipo"] ?>">
            </div>

            <a href="index.php" class="btn btn-danger">Cancelar</a>
            <button type="submit" class="btn btn-success">Salvar</button>

        </form>
    </section>

    <?php require "../_partials/footer.php"; ?>