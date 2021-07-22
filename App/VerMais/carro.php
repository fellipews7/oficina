<?php


if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (isset($_SESSION['login']) and $_SESSION['login'] == 1) {

include_once 'includes/header.php';
require_once '../connection.php';

?>

<div  class="row">
    <div class="col s12 m6 push-m3">
    <a href="../Consulta-Carros.php" class="btn black">Retornar</a><h3 class="light">Carros</h3>
        <div class="responsive-table">
            <table class="table striped">
                <thead>
                    <th>Código</th>
                    <th>Placa</th> 
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Ano Modelo</th>
                    <th>Ano Fabricado</th>
                    <th>Renavam</th>
                </thead>

                <tbody>
                    <?php
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM carros WHERE id = ".$id;
                        $resultado = mysqli_query($connect, $sql);
                        while($dados = mysqli_fetch_array($resultado)):
                    ?>
                    <tr>
                        <td><?php echo $dados['id']?></td>
                        <td><?php echo $dados['placa']?></td>
                        <td><?php echo $dados['modelo']?></td>
                        <td><?php echo $dados['marca']?></td>
                        <td><?php echo $dados['ano_modelo']?></td>
                        <td><?php echo $dados['ano_fabricado']?></td>
                        <td><?php echo $dados['renavam']?></td>
                    </tr>
                </tbody>
            </table>
            <div class="center-align margin top-20">
                <a href="editarCarro.php?id=<?php echo $dados['id']?>" class="btn black">Editar</a>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>



<?php
include_once 'includes/footer.php';


} else {
    header('location: ../../index.php');
    $_SESSION['tipoErro'] = 'Por favor faça login!';
    $_SESSION['mensagem'] = 'erro';
}