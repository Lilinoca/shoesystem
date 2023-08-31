<?php require "../_helpers/index.php";
echo siteHeader("Gerenciar Calçados");
require("../_config/connection.php");
require("../dao/calcado.php");


$message = false;
if ($_GET && $_GET["message"]) {
	$message = $_GET["message"];
}
$calcados = new Calcado();
?>
<section class="container mt-5 mb-5">

	<?php if ($message) : ?>
		<div class="alert alert-primary alert-dismissible fade show" role="alert">
			<?= $message ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php endif; ?>

	<div class="row mb-3">
		<div class="col">
			<h1>Calçado</h1>
		</div>
		<div class="col d-flex justify-content-end align-items-center">
			<a class="btn btn-primary" href="add.php">Adicionar</a>
		</div>
	</div>

	<table class="table table-striped table-bordered text-center">
		<thead class="table-dark">
			<tr>
				<th>ID</th>
				<th>Tipo</th>
				<th>Modelo</th>
				<th>Material</th>				
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($calcados->getAll() AS $calcado) : ?>
				<tr>
					<td>
						<?= "#".$calcado->id?>
					</td>

					<td>
						<?= $calcado->tipo ?>
					</td>
					
					<td>
						<?= $calcado->modelo ?>
					</td>
					
					<td>
						<?= $calcado->material ?>
					</td>					
					<td>
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-outline-primary" onclick="confirmDelete(<?= $calcado->id ?>)">
								Excluir
							</button>
							<a href="edit.php?id=<?= $calcado->id ?>" class="btn btn-outline-primary">
								Editar
							</a>
							<a href="view.php?id=<?= $calcado->id ?>" class="btn btn-outline-primary">
								Ver
							</a>
						</div>
					</td>
				</tr>

			<?php endforeach; ?>
		</tbody>
		<tfooter class="table-dark">
			<tr>
				<th>ID</th>
				<th>Tipo</th>
				<th>Modelo</th>
				<th>Material</th>				
				<th>Ações</th>
			</tr>
		</tfooter>
	</table>
</section>

<script>
	const confirmDelete = (idCalcado) => {
		const response = confirm("Deseja realmente excluir este calçado?")
		if (response) {
			window.location.href = "delete.php?id=" + idCalcado
		}
	}
</script>

<?php require("../_partials/footer.php"); ?>