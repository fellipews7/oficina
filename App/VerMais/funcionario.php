<?php
include_once 'includes/header.php';
require_once '../connection.php';
include_once 'includes/mensagem.php';
?>

<div  class="row">
    <div class="col s12 m6 push-m3">
    <a href="../Consulta-Funcionarios.php" class="btn black">Retornar</a><h3 class="light">Funcionários</h3>
        <table class="striped">
            <thead>
                <th>Matricula</th>
                <th>Cargo</th> 
                <th>Nome</th>
                <th>Telefone</th>
            </thead>

            <tbody>
                <?php
                    $matricula = $_GET['matricula'];
                    $sql = "SELECT funcionarios.matricula, cargos.nome AS cargo, funcionarios.email,
                            funcionario.idade FROM funcionarios INNER JOIN cargos 
                            WHERE matricula = '$matricula'";
                    $resultado = mysqli_query($connect, $sql);
                    while($dados = mysqli_fetch_array($resultado)):
                ?>
                <tr>
                    <td><?php echo $dados['funcionarios.matricula']?></td>
                    <td><?php echo $dados['cargo']?></td>
                    <td><?php echo $dados['funcionarios.email']?></td>
                    <td><?php echo $dados['funcionarios.idade']?></td>
                    <td><a href="editarFuncionario.php?id=<?php echo $dados['id']?>" class="btn black"><i class="material-icons">Editar</i> </a></td>
                    <td></td>

                </tr>

                <?php endwhile; ?>
            </tbody>
        </table>
        <br>
    </div>
</div>



<?php
include_once 'includes/footer.php';
?>