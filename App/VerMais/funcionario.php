<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (isset($_SESSION['login']) and $_SESSION['login'] == 1) {

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
                <th>CPF</th>
            </thead>

            <tbody>
                <?php
                    $matricula = $_GET['matricula'];
                    $sql = "SELECT funcionarios.matricula AS matricula, cargos.nome AS cargo, funcionarios.nome AS nome,
                            funcionarios.cpf AS cpf, funcionarios.login AS login, funcionarios.telefone_contato AS telefone FROM funcionarios 
                            INNER JOIN cargos ON cargos.id = funcionarios.cargos_id WHERE matricula = '$matricula'";

                    $resultado = mysqli_query($connect, $sql);
                    while($dados = mysqli_fetch_array($resultado)):
                ?>
                <tr>
                    <td><?php echo $dados['matricula']?></td>
                    <td><?php echo $dados['cargo']?></td>
                    <td><?php echo $dados['nome']?></td>
                    <td><?php echo $dados['telefone']?></td>
                    <td><?php echo $dados['login']?></td>
                    <td><?php echo $dados['cpf']?></td>
                </tr>
            </tbody>
        </table>
        <div class="center-align margin top-20">
            <a href="editarFuncionario.php?matricula=<?php echo $dados['matricula']?>" class="btn black">Editar</a>
        </div>
        <?php endwhile; ?>
    </div>
</div>



<?php
include_once 'includes/footer.php';
} else {
    header('location: ../../index.php');
    $_SESSION['tipoErro'] = 'Por favor faça login!';
    $_SESSION['mensagem'] = 'erro';
}