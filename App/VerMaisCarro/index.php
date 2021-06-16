<?php
include_once 'includes/header.php';
require_once '../connection.php';
include_once 'includes/mensagem.php';
?>

<div  class="row">
    <div class="col s12 m6 push-m3">
    <a href="../Consulta-Carros.php" class="btn black">Retornar</a><h3 class="light">Carros</h3>
        <table class="striped">
            <thead>
                <th>ID</th>
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