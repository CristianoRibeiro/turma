<h1>Editar Professor</h1>
<?php
$id  = @$_REQUEST["id"];
$query = "select * from professor where idprofessor  = '{$id}'";
$result = $conn->query( $query );
$num_results = $result->num_rows;
while ($row = $result->fetch_assoc()) {
?>
<form action="index.php?page=sal-professor" method="POST">
	<input type="hidden" name="acao" value="editar">
	<div class="form-group">
		<label>Matrícula</label>
  	<input type="text" name="idprofessor" value="<?php echo $id ?>" readonly class="form-control col-1">
	</div>
	<div class="form-group">
		<label>Professor</label>
		<input type="text" name="nome_professor" class="form-control"  value="<?php echo $row['nome'] ?>" >
	</div>
	
	<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php 
}

?>