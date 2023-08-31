<?php require "../_helpers/index.php";
echo siteHeader("Adicionar Calçado");
require("../_config/connection.php");
require("../dao/calcado.php");
require("../dao/tipo.php");

$calcadoDAO = new Calcado();
$tipoDAO = new Tipo();

$result = false;
$error = false;
if ($_POST) {
    try {
        $idTipo  = $_POST["p_idTipo"];
        $modelo = $_POST["p_modelo"];
        $material = $_POST["p_material"];
        
        $result = $calcadoDAO->insert($idTipo, $modelo, $material);
         if ($result) {
            header('Location: index.php?message=Calçado inserido com sucesso!');
            die();
        } 
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
try {
    $tipos = $tipoDAO->getAll();
} catch (Exception $e) {
    header('Location: index.php?message=Erro ao recuperar tipos de calçado!');
    die();
}
?>

<section class="container mt-5 mb-5">

    <?php if ($_POST && (!$result || $error)) : ?>
        <p>
            Erro ao salvar o calçado.
            <?= $error ? $error : "Erro desconhecido." ?>
        </p>
    <?php endif; ?>

    <div class="row mb-3">
        <div class="col">
            <h1>Adicionar Calçado</h1>
        </div>
    </div>

    <form action="" method="post">
        <div class="row">

            <div class="mb-3">
                <label for="p_idTipo" class="form-label">Selecione o tipo de Calçado: </label>
                <select class="form-select" id="p_idTipo" name="p_idTipo" required>
                    <option value="">-- Selecione um --</option>

                    <?php foreach ($tipos as $tipo) : ?>
                        <option value="<?= $tipo->id ?>">
                            <?= $tipo->tipo ?>
                        </option>
                    <?php endforeach; ?>

                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-3">
                <label for="p_modelo" class="form-label">Modelo: </label>
                <input type="text" class="form-control" id="p_modelo" name="p_modelo" />
            </div>
            <div class="col-9">
                <label for="p_material" class="form-label">Material: </label>
                <input type="text" class="form-control" id="p_material" name="p_material" />
            </div>
        </div>
        
        
        <div class="row">
            <div class="col">
                <a href="index.php" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
        </div>

    </form>
</section>

<?php require "../_partials/footer.php"; ?>