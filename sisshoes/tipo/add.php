<?php require "../_helpers/index.php";
echo siteHeader("Adicionar Tipo");
require("../_config/connection.php");

require("../dao/tipo.php");
$tipoDAO = new Tipo();

$result = false;
$error = false;


if ($_POST) {
    try {
        $tipo = $_POST["p_tipo"];
        
        $rs = $tipoDAO->insert($tipo);

        if ($rs) {
            header('Location: index.php?message=Tipo inserido com sucesso!');
            die();
        }
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}


?>

<body>



    <section class="container mt-5 mb-5">

        <?php if ($_POST && (!$result || $error)) : ?>
            <p>
                Erro ao salvar tipo.
                <?= $error ? $error : "Erro desconhecido." ?>
            </p>
        <?php endif; ?>

        <div class="row mb-3">
            <div class="col">
                <h1>Adicionar Tipo</h1>
            </div>
        </div>

        <form action="" method="post">
            <div class="mb-3">
                <label for="p_nome" class="form-label">Tipo: </label>
                <input type="text" class="form-control" id="p_tipo" name="p_tipo" placeholder="Tipo de calçado">
            </div>

            <a href="index.php" class="btn btn-danger">Cancelar</a>
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </section>

    <?php require "../_partials/footer.php"; ?>