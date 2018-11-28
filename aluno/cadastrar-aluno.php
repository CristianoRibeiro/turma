<?php
$sql = "SELECT * FROM curso";
$result = $conn->query( $sql );
$num_results = $result->num_rows;

?>
  


<h1>Cadastrar Aluno</h1>
<form action="index.php?page=sal-aluno" method="POST">
	<input type="hidden" name="acao" value="cadastrar">
	<div class="form-group">
		<label>Nome</label>
		<input type="text" name="nome_aluno" class="form-control">
	</div>
	<div class="form-group">
	<select class="form-control" name="idcurso">
	<?php if($num_results > 0) {
            while($row = $result->fetch_assoc()) { ?>
		 <option value="<?php echo $row['idcurso'] ?>"><?php echo $row['nome']; ?></option>

	<?php } }?>
</select>
</div>
	
	<button type="submit" class="btn btn-primary">Enviar</button>
</form>