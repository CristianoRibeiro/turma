
<div class="jumbotron mt-5 mb-5">
  <h1 class="display-4">Oi, bem vindo!</h1>
  <p class="lead">Crie novos cadastros de curso.</p>
  <hr class="my-4">
  <a class="btn btn-primary btn-lg" href="index.php?page=cad-curso" role="button">Cadastrar Curso</a>
</div>

<h3>Cursos</h3>
<br>

<?php

$query = "SELECT idcurso ,curso.idprofessor as idprofessor, curso.nome as nc, professor.nome  as np,  professor.idprofessor as idprofessor_professor
FROM curso
INNER JOIN professor ON (curso.idprofessor = professor.idprofessor)";
$result = $conn->query( $query );
$num_results = $result->num_rows;

?>

<table class="table table-hover ">
  <thead>
    <tr class="thead-light">
      <th>ID</th>
      <th>Nome</th>
      <th>Professor</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php
       
        if($num_results > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td  scope='row'>".$row['idcurso']."</td>
                    <td  scope='row'>".$row['nc']."</td>
                    <td>".$row['np']."</td>
                    <td>
                        <a href='index.php?page=edi-curso&id=".$row['idcurso']."'><button class='btn btn-warning' type='button'>Edit</button></a>"; 

                        ?>
                        
                        <form class="form-inline" action="index.php?page=sal-curso" method="POST">
                          <input type="hidden" name="acao" value="excluir">
                          <input type="hidden" name="id" value="<?php echo $row['idcurso'] ?>">
                          <button type="submit" class="btn btn-danger" onClick="return confirm('Deleta esse curso?')">Remove</button>
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


