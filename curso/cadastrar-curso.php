<?php
$sql = "SELECT * FROM professor";
$result = $conn->query( $sql );
$num_results = $result->num_rows;

?>
  
  
<h1>Cadastrar Curso</h1>
<form action="index.php?page=sal-curso" method="POST">
	<input type="hidden" name="acao" value="cadastrar">
	<div class="form-group">
		<label>Nome</label>
		<input type="text" name="nome_curso" class="form-control">
	</div>

	<div class="form-group">
	<select class="form-control" name="idprofessor">
	<?php if($num_results > 0) {
            while($row = $result->fetch_assoc()) { ?>
		 <option value="<?php echo $row['idprofessor'] ?>"><?php echo $row['nome']; ?></option>

	<?php } }?>
</select>
</div>
</div>
	<button type="submit" class="btn btn-primary">Enviar</button>
</form>