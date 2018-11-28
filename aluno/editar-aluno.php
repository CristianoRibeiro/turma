
<?php
	$id  = @$_REQUEST["id"];

	$query = "SELECT id_aluno, nome_aluno, nome, aluno.idcurso as idcurso, curso.idcurso as idcurso_curso
	FROM aluno
	INNER JOIN curso ON (aluno.idcurso = curso.idcurso) where id_aluno ='{$id}'";
	$result = $conn->query( $query );
	$num_results = $result->num_rows;
	while ($row = $result->fetch_assoc()) {

?>

<h1>Editar aluno</h1>
  
  
<form action="index.php?page=sal-aluno" method="POST">
	<input type="hidden" name="acao" value="editar">
	<div class="form-group">
		<label>Matrícula</label>
  	<input type="text" name="id" value="<?php echo $id ?>" readonly class="form-control col-1">
	</div>
	<div class="form-group">
		<label>Nome</label>
		<input type="text" name="nome_aluno" class="form-control"  value="<?php echo $row['nome_aluno'] ?>" >
	</div>
	<div class="form-group">

	<?php
			$sql = "SELECT * FROM curso";
			$result = $conn->query( $sql );
			$num_results_curso = $result->num_rows;
	?>


	<select class="form-control" name="idcurso">
	
	<option> Selecione um Curso</option>
	<?php if($num_results_curso > 0) {
            while($curso = $result->fetch_assoc()) { 
								
							$selected = $curso['idcurso'] == $row['idcurso'] ? 'selected' : '';
							// var_dump($selected);
	?>
		<option <?php echo $selected; ?> value="<?php echo $curso['idcurso']; ?>" >
																
			<?php  echo $curso['nome']; ?>
			
		</option>

	<?php 
					} 
			}
	?>

</select>
</div>
</div>
	
	<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php 
}

?>