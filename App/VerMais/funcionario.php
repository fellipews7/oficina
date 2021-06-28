<?php
include_once 'includes/header.php';
require_once '../connection.php';
include_once '../assets/php/mensagem.php';
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
                <th>Login</th>
                <th>cpf</th>
            </thead>

            <tbody>
                <?php
                    $matricula = $_GET['matricula'];
                    $sql = "SELECT funcionarios.matricula AS matricula, cargos.nome AS cargo, funcionarios.cpf AS cpf,
                            funcionarios.login AS login, funcionarios.telefone_contato AS telefone FROM funcionarios 
                            INNER JOIN cargos ON cargos.id = funcionarios.cargos_id 
                            WHERE matricula = '$matricula'";

                    $resultado = mysqli_query($connect, $sql);
                    while($dados = mysqli_fetch_array($resultado)):
                ?>
                <tr>
                    <td><?php echo $dados['matricula']?></td>
                    <td><?php echo $dados['cargo']?></td>
                    <td><?php echo $dados['cpf']?></td>
                    <td><?php echo $dados['cpf']?></td>
                    <td><?php echo $dados['login']?></td>
                    <td><a href="editarFuncionario.php?matricula=<?php echo $dados['matricula']?>" class="btn black">Editar </a></td>
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