<?php
include_once 'includes/header.php';
require_once 'phpaction/db_connect.php';
include_once 'includes/mensagem.php';
?>

<div  class="row">
    <div class="col s12 m6 push-m3">
    <a href="../Consulta-Orcamento.php" class="btn black">Retornar</a><h3 class="light">Orçamentos</h3>
        <table class="striped">
            <thead>
                <th>ID Orçamento</th>
                <th>ID Cliente</th>
                <th>ID Carro</th> 
                <th>Descrição Serviço</th>
                <th>Preço Mão de Obra</th>
                <th>Descrição Produto</th> 
                <th>Preço Produtos</th> 
                <th>Data Orçamento</th> 
                <th>Status</th>
                <th>Tipo Manutenção</th>
            </thead>

            <tbody>
                <?php
                    $sql = "SELECT * FROM clientes";
                    $resultado = mysqli_query($connect, $sql);
                    while($dados = mysqli_fetch_array($resultado)):
                ?>
                <tr>
                    <td><?php echo $dados['idade']?></td>
                    <td><?php echo $dados['idade']?></td>
                    <td><?php echo $dados['idade']?></td>
                    <td><?php echo $dados['idade']?></td>
                    <td><?php echo $dados['idade']?></td>
                    <td><?php echo $dados['idade']?></td>
                    <td><?php echo $dados['idade']?></td>
                    <td><?php echo $dados['idade']?></td>
                    <td><?php echo $dados['idade']?></td>
                    <td><?php echo $dados['idade']?></td>
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