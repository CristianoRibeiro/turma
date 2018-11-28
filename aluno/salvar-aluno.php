<?php
	$nome = @$_REQUEST["nome_aluno"];
	$curso  = @$_REQUEST["idcurso"];
	$id  = @$_REQUEST["id"];

	switch ($_REQUEST["acao"]) {
		case 'cadastrar':
			$sql = "INSERT INTO aluno (nome_aluno, idcurso) VALUES ('{$nome}', '{$curso}')";
			$res = $conn->query($sql) or die($conn->error);
			if($res==true){
				print "<br><div class='alert alert-success'>Cadastrou com sucesso!</div>";
				?>
					<script>
					setTimeout(function () {
						window.location.href= 'index.php?page=lis-aluno';
					}, 3000);
					</script>
				<?php
				exit(); 
			}else{
				print "<br><div class='alert alert-danger'>Não foi possível cadastrar.</div>";
				?>
					<script>
					setTimeout(function () {
						window.location.href= 'index.php?page=lis-aluno';
					}, 3000);
					</script>
				<?php
				exit();
			}
			break;
		case 'editar':
			$sql = "UPDATE aluno 
							SET nome_aluno = '{$nome}', 
							 idcurso = '{$curso}'
							
							WHERE id_aluno = {$id}";
			$res = $conn->query($sql) or die($conn->error);
			if($res==true){
				print "<br><div class='alert alert-success'>Atualizado com sucesso!</div>";
				?>
					<script>
					setTimeout(function () {
						window.location.href= 'index.php?page=lis-aluno';
					}, 3000);
					</script>
				<?php
				exit();

			}else{
				print "<br><div class='alert alert-danger'>Não foi possível atualizar.</div>";
			?>
					<script>
					setTimeout(function () {
						window.location.href= 'index.php?page=lis-aluno';
					}, 3000);
					</script>
				<?php
				exit();
			}
			break;
		case 'excluir':
		 $sql = "DELETE FROM aluno  WHERE id_aluno = {$id}";
		 $res = $conn->query($sql) or die($conn->error);
			if($res==true){
				print "<br><div class='alert alert-success'>Deletado com sucesso!</div>";
				?>
					<script>
					setTimeout(function () {
						window.location.href= 'index.php?page=lis-aluno';
					}, 3000);
					</script>
				<?php
				exit();
			}else{
				print "<br><div class='alert alert-danger'>Não foi possível Deletar.</div>";
				?>
					<script>
					setTimeout(function () {
						window.location.href= 'index.php?page=lis-aluno';
					}, 3000);
					</script>
				<?php
			exit();
			}
			break;
	}
?>