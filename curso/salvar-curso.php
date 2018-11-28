<?php
	$nome = @$_REQUEST["nome_curso"];
	$idprofessor  = @$_REQUEST["idprofessor"];
	$id  = @$_REQUEST["id"];

	switch ($_REQUEST["acao"]) {
		case 'cadastrar':
			$sql = "INSERT INTO curso (nome, idprofessor) VALUES ('{$nome}', '{$idprofessor}')";
			$res = $conn->query($sql) or die($conn->error);
			if($res==true){
				print "<br><div class='alert alert-success'>Cadastrou com sucesso!</div>";
				?>
					<script>
					setTimeout(function () {
						window.location.href= 'index.php?page=lis-curso';
					}, 3000);
					</script>
				<?php
				exit(); 
			}else{
				print "<br><div class='alert alert-danger'>Não foi possível cadastrar.</div>";
				?>
					<script>
					setTimeout(function () {
						window.location.href= 'index.php?page=lis-curso';
					}, 3000);
					</script>
				<?php
				exit();
			}
			break;
		case 'editar':
			$sql = "UPDATE curso 
							SET nome = '{$nome}', 
							 idprofessor = '{$idprofessor}'
							
							WHERE idcurso = {$id}";
			$res = $conn->query($sql) or die($conn->error);
			if($res==true){
				print "<br><div class='alert alert-success'>Atualizado com sucesso!</div>";
				?>
					<script>
					setTimeout(function () {
						window.location.href= 'index.php?page=lis-curso';
					}, 3000);
					</script>
				<?php
				exit();

			}else{
				print "<br><div class='alert alert-danger'>Não foi possível atualizar.</div>";
			?>
					<script>
					setTimeout(function () {
						window.location.href= 'index.php?page=lis-curso';
					}, 3000);
					</script>
				<?php
				exit();
			}
			break;
		case 'excluir':
		 $sql = "DELETE FROM curso  WHERE idcurso = {$id}";
		 $res = $conn->query($sql) or die($conn->error);
			if($res==true){
				print "<br><div class='alert alert-success'>Deletado com sucesso!</div>";
				?>
					<script>
					setTimeout(function () {
						window.location.href= 'index.php?page=lis-curso';
					}, 3000);
					</script>
				<?php
				exit();
			}else{
				print "<br><div class='alert alert-danger'>Não foi possível Deletar.</div>";
				?>
					<script>
					setTimeout(function () {
						window.location.href= 'index.php?page=lis-curso';
					}, 3000);
					</script>
				<?php
			exit();
			}
			break;
	}
?>