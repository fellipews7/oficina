<?php
include_once 'includes/header.php';
require_once '../connection.php';
include_once 'includes/mensagem.php';
?>

<div  class="row">
    <div class="col s12 m6 push-m3">
    <a href="../Consulta-OS.php" class="btn black">Retornar</a><h3 class="light">Ordens de Serviço</h3>
        <table class="striped">
            <thead>
                <th>ID Ordem de Serviço</th>
                <th>ID Orçamento</th>
                <th>ID Cliente</th>
                <th>ID Carro</th>
                <th>Descrição Produtos</th>
                <th>Valor Produtos</th>
                <th>Descrição Serviços</th>
                <th>Valor Serviços</th>
                <th>Data Cadastro</th>
                <th>Data PRevisão</th>
                <th>Data Entrega</th>
                <th>Valor total</th>
                <th>Quilometragem</th>
                <th>Matricula funcionario</th>
                <th>Tipo manutenção</th>
                <th>Status</th>
            </thead>

            <tbody>
                <?php
                    $sql = "SELECT * FROM clientes";
                    $resultado = mysqli_query($connect, $sql);
                    while($dados = mysqli_fetch_array($resultado)):
                ?>
                <tr>
                    <td><?php echo $dados['nome']?></td>
                    <td><?php echo $dados['nome']?></td>
                    <td><?php echo $dados['nome']?></td>
                    <td><?php echo $dados['nome']?></td>
                    <td><?php echo $dados['nome']?></td>
                    <td><?php echo $dados['nome']?></td>
                    <td><?php echo $dados['nome']?></td>
                    <td><?php echo $dados['nome']?></td>
                    <td><?php echo $dados['nome']?></td>
                    <td><?php echo $dados['nome']?></td>
                    <td><?php echo $dados['nome']?></td>
                    <td><?php echo $dados['nome']?></td>
                    <td><?php echo $dados['nome']?></td>
                    <td><?php echo $dados['nome']?></td>
                    <td><?php echo $dados['nome']?></td>
                    <td><?php echo $dados['nome']?></td>
                    <td><a href="editar.php?id=<?php echo $dados['id']?>" class="btn black"><i class="material-icons">Editar</i> </a></td>
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