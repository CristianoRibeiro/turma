<?php
	//conexão com o banco de dados
	$host = "localhost";
	$user = "root";
	$pass = "root";
	$db   = "turma";
	$port   = "3306";
	

	$conn = new mysqli($host,$user,$pass,$db,$port) or die($conn->error);
// show errors (remove this line if on a live site)
mysqli_report(MYSQLI_REPORT_ERROR);

	//inclusão de páginas
	switch (@$_REQUEST["page"]) {
		//aluno		
		case 'cad-aluno':
			include("aluno/cadastrar-aluno.php");
			break;
		case 'edi-aluno':
			include("aluno/editar-aluno.php");
			break;
		case 'lis-aluno':
			include("aluno/listar-aluno.php");
			break;
		case 'sal-aluno':
			include("aluno/salvar-aluno.php");
			break;

			//curso		
		case 'cad-curso':
		include("curso/cadastrar-curso.php");
		break;
	case 'edi-curso':
		include("curso/editar-curso.php");
		break;
	case 'lis-curso':
		include("curso/listar-curso.php");
		break;
	case 'sal-curso':
		include("curso/salvar-curso.php");
		break;

		//professor		
		case 'cad-professor':
		include("professor/cadastrar-professor.php");
		break;
	case 'edi-professor':
		include("professor/editar-professor.php");
		break;
	case 'lis-professor':
		include("professor/listar-professor.php");
		break;
	case 'sal-professor':
		include("professor/salvar-professor.php");
		break;
		
		default:
			include("aluno/listar-aluno.php");

	}

?>