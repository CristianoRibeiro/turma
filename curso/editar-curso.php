

<?php
	$id  = @$_REQUEST["id"];
	$query = "SELECT idcurso ,curso.idprofessor as idprofessor, curso.nome as nc, professor.nome  as np,  professor.idprofessor as idprofessor_professor
	FROM curso
	INNER JOIN professor ON (curso.idprofessor = professor.idprofessor) where idcurso = '{$id}'";
	$result = $conn->query( $query );
	$num_results = $result->num_rows;
	while ($row = $result->fetch_assoc()) {

?>

<h1>Editar aluno</h1>

<form action="index.php?page=sal-curso" method="POST">
	<input type="hidden" name="acao" value="editar">
	<div class="form-group">
		<label>ID</label>
  	<input type="text" name="id" value="<?php echo $id ?>" readonly class="form-control col-1">
	</div>
	<div class="form-group">
		<label>Nome</label>
		<input type="text" name="nome_curso" class="form-control"  value="<?php echo $row['nc'] ?>" >
	</div>

	<div class="form-group">

	<?php
			$sql = "SELECT * FROM professor";
			$result = $conn->query( $sql );
			$num_results_professor = $result->num_rows;
	?>


	<select class="form-control" name="idprofessor">
	<option> Selecione um Professor</option>
	<?php if($num_results_professor > 0) {
            while($professor = $result->fetch_assoc()) { 
								
							$selected = $professor['idprofessor'] == $row['idprofessor'] ? 'selected' : '';
							// var_dump($selected);
	?>
		<option <?php echo $selected; ?> value="<?php echo $professor['idprofessor']; ?>" >
																
			<?php  echo $professor['nome']; ?>
			
		</option>

	<?php 
					} 
			}
	?>

</select>

</div>
	<button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php 
}
?>