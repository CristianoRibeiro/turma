<?php
	$nome = @$_REQUEST["nome_professor"];
	$id  = @$_REQUEST["idprofessor"];

	switch ($_REQUEST["acao"]) {
		case 'cadastrar':
			$sql = "INSERT INTO professor (nome) VALUES ('{$nome}')";
			$res = $conn->query($sql) or die($conn->error);
			if($res==true){
				print "<br><div class='alert alert-success'>Cadastrou com sucesso!</div>";
				?>
					<script>
					setTimeout(function () {
						window.location.href= 'index.php?page=lis-professor';
					}, 3000);
					</script>
				<?php
				exit(); 
			}else{
				print "<br><div class='alert alert-danger'>Não foi possível cadastrar.</div>";
				?>
					<script>
					setTimeout(function () {
						window.location.href= 'index.php?page=lis-professor';
					}, 3000);
					</script>
				<?php
				exit();
			}
			break;
		case 'editar':
			$sql = "UPDATE professor 
							SET nome = '{$nome}'
							WHERE idprofessor = {$id}";
			$res = $conn->query($sql) or die($conn->error);
			if($res==true){
				print "<br><div class='alert alert-success'>Atualizado com sucesso!</div>";
				?>
					<script>
					setTimeout(function () {
						window.location.href= 'index.php?page=lis-professor';
					}, 3000);
					</script>
				<?php
				exit();

			}else{
				print "<br><div class='alert alert-danger'>Não foi possível atualizar.</div>";
			?>
					<script>
					setTimeout(function () {
						window.location.href= 'index.php?page=lis-professor';
					}, 3000);
					</script>
				<?php
				exit();
			}
			break;
		case 'excluir':
		 $sql = "DELETE FROM professor  WHERE idprofessor = {$id}";
		 $res = $conn->query($sql) or die($conn->error);
			if($res==true){
				print "<br><div class='alert alert-success'>Deletado com sucesso!</div>";
				?>
					<script>
					setTimeout(function () {
						window.location.href= 'index.php?page=lis-professor';
					}, 3000);
					</script>
				<?php
				exit();
			}else{
				print "<br><div class='alert alert-danger'>Não foi possível Deletar.</div>";
				?>
					<script>
					setTimeout(function () {
						window.location.href= 'index.php?page=lis-professor';
					}, 3000);
					</script>
				<?php
			exit();
			}
			break;
	}
?>