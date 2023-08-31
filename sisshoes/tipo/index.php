<?php require "../_helpers/index.php";
echo siteHeader("Gerenciar Tipos Calçado");
require("../_config/connection.php");
require("../dao/tipo.php");

$message = false;
$tipoDAO = new Tipo();

if ($_GET) {
	if (isset($_GET["message"])) {
		$message = $_GET["message"];
	}	
}
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
			<h1>Tipo Calçado</h1>
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
				<th>Ações</th>	
			</tr>
		</thead>
		<tbody>
			<?php foreach ($tipoDAO->getAll() AS $tipo) : ?>
				<tr>
					<td>
						<?= "#".$tipo->id ?>
					</td>
					<td>
						<?= $tipo->tipo ?>
					</td>									
					<td>
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-outline-primary" onclick="confirmDelete(<?= $tipo->id ?>)">
								Excluir
							</button>
							<a href="edit.php?id=<?= $tipo->id ?>" class="btn btn-outline-primary">
								Editar
							</a>
							<a href="view.php?id=<?= $tipo->id ?>" class="btn btn-outline-primary">
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
				<th>Ações</th>
			</tr>
		</tfooter>
	</table>
</section>


<script>
	const confirmDelete = (productId) => {
		const response = confirm("Deseja realmente excluir este tipo de calçado?")
		if (response) {
			window.location.href = "delete.php?id=" + productId
		}
	}
</script>

<?php require("../_partials/footer.php"); ?>