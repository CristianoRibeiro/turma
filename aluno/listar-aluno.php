
<div class="jumbotron mt-5 mb-5">
  <h1 class="display-4">Oi, bem vindo!</h1>
  <p class="lead">Crie novos cadastros de alunos citando seu respectivo curso.</p>
  <hr class="my-4">
  <a class="btn btn-danger btn-lg" href="index.php?page=cad-aluno" role="button">Cadastrar Aluno</a>
</div>

<h3>Alunos</h3>
<br>

<?php

$query = "SELECT id_aluno, nome_aluno, aluno.idcurso as idcurso, curso.nome as nome_curso,  curso.idcurso as idcurso_curso
FROM aluno
INNER JOIN curso ON (aluno.idcurso = curso.idcurso)";
$result = $conn->query( $query );
$num_results = $result->num_rows;

?>

<table class="table table-hover ">
  <thead>
    <tr class="thead-light">
      <th>Matrícula</th>
      <th>Nome</th>
      <th>Curso</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php
       
        if($num_results > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td  scope='row'>".$row['id_aluno']."</td>
                    <td  scope='row'>".$row['nome_aluno']."</td>
                    <td>".$row['nome_curso']."</td>
            
                    <td>
                        <a href='index.php?page=edi-aluno&id=".$row['id_aluno']."'><button class='btn btn-warning' type='button'>Edit</button></a>"; 

                        ?>
                        
                        <form class="form-inline" action="index.php?page=sal-aluno" method="POST">
                          <input type="hidden" name="acao" value="excluir">
                          <input type="hidden" name="id" value="<?php echo $row['id_aluno'] ?>">
                          <button type="submit" class="btn btn-danger" onClick="return confirm('Deleta esse aluno?')">Remove</button>
                        </form>

                        <?php 
                        echo "
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='5'><center>Não há alunos cadastrados</center></td></tr>";
        }
        ?>

   
  </tbody>
</table>


