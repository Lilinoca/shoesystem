<?php require "../_helpers/index.php";
echo siteHeader("Editar Calçado");
require("../_config/connection.php");

require("../dao/calcado.php");
require("../dao/tipo.php");
$calcadoDAO = new Calcado();
$tipoDAO = new Tipo();

$calcado = false;
$error = false;

if (!$_GET || !isset($_GET["id"])) {
    header('Location: index.php?message=Id do calçado não informado!');
    die();
}

$idCalcado = $_GET["id"];

try {
    $calcado = $calcadoDAO->getById($idCalcado);
} catch (Exception $e) {
    $error = $e->getMessage();
}

if (!$calcado || $error) {
    header('Location: index.php?message=Erro ao recuperar dados do calçado!');
    die();
}

$upadeError = false;
$updateResult = false;
if ($_POST) {
    try {
        $idTipo  = $_POST["p_idTipo"];
        $modelo = $_POST["p_modelo"];
        $material = $_POST["p_material"];
        
        $rs = $calcadoDAO->update($idCalcado, $idTipo, $modelo, $material);
        
        if ($rs) {
            header('Location: index.php?message=Calçado alterado com sucesso!');
            die();
        }
    } catch (Exception $e) {
        $upadeError = $e->getMessage();
    }
}
try {
    $tipos = $tipoDAO->getAll();
} catch (Exception $e) {
    header('Location: index.php?message=Erro ao recuperar tipos!');
    die();
}

?>


<section class="container mt-5 mb-5">

    <?php if ($_POST && (!$rs || $upadeError)) : ?>
        <p>
            Erro ao alterar o calçado.
            <?= $error ? $error : "Erro desconhecido." ?>
        </p>
    <?php endif; ?>

    <div class="row mb-3">
        <div class="col">
            <h1>Editar Calçado</h1>
        </div>
    </div>

    <form action="" method="post">
    <div class="row">

        <div class="mb-3">
            <label for="p_idTipo" class="form-label">Selecione o tipo do Calçado: </label>
            <select class="form-select" id="p_idTipo" name="p_idTipo" required>
                <option value="">-- Selecione um --</option>

                <?php foreach ($tipos as $tipo) : ?>
                    <option value="<?= $tipo->id ?>" <?= $tipo->id == $calcado["idTipo"] ? "selected" : "" ?> >
                        <?= $tipo->tipo ?>
                </option>

                <?php endforeach; ?>

            </select>
        </div>        
        
        <div class="row mb-3">
            <div class="col-3">
                <label for="p_modelo" class="form-label">Modelo: </label>
                <input type="text" class="form-control" id="p_modelo" name="p_modelo" value="<?= $calcado["modelo"] ?>" />
            </div>
            <div class="col-9">
                <label for="p_material" class="form-label">Material: </label>
                <input type="text" class="form-control" id="p_material" name="p_material" value="<?= $calcado["material"] ?>"/>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="index.php" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-success">Atualizar</button>
            </div>
        </div>

    </form>
</section>

<?php require "../_partials/footer.php"; ?>