
<div class="jumbotron mt-5 mb-5 ">
  <h1 class="display-4">Oi, bem vindo!</h1>
  <p class="lead">Crie novos cadastros de Professores.</p>
  <hr class="my-4">
  <a class="btn btn-warning btn-lg" href="index.php?page=cad-professor" role="button">Cadastrar professor</a>
</div>

<h3>Professor</h3>
<br>

<?php
$query = "select * from professor";
$result = $conn->query( $query );
$num_results = $result->num_rows;
?>

<table class="table table-hover ">
  <thead>
    <tr class="thead-light">
      <th>Matrícula</th>
      <th>Nome</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php
       
        if($num_results > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td  scope='row'>".$row['idprofessor']."</td>
                    <td  scope='row'>".$row['nome']."</td>
                    <td>
                        <a href='index.php?page=edi-professor&id=".$row['idprofessor']."'><button class='btn btn-warning' type='button'>Edit</button></a>"; 

                        ?>
                        
                        <form class="form-inline" action="index.php?page=sal-professor" method="POST">
                          <input type="hidden" name="acao" value="excluir">
                          <input type="hidden" name="idprofessor" value="<?php echo $row['idprofessor'] ?>">
                          <button type="submit" class="btn btn-danger" onClick="return confirm('Deleta esse professor?')">Remove</button>
                        </form>

                        <?php 
                        echo "
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='5'><center>Não há professor cadastrados</center></td></tr>";
        }
        ?>

   
  </tbody>
</table>


