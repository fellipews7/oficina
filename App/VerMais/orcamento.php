<?php
include_once 'includes/header.php';
require_once '../connection.php';

?>

<div class="container">
    <div  class="left-align">
        <div class="col s1 m6 push-m3">
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
                </thead>

                <tbody>
                    <?php
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM orcamentos WHERE id = '$id'";
                        $resultado = mysqli_query($connect, $sql);
                        while($dados = mysqli_fetch_array($resultado)):
                    ?>
                    <tr>
                        <td><?php echo $dados['id']?></td>
                        <td><?php echo $dados['clientes_id']?></td>
                        <td><?php echo $dados['carros_id']?></td>
                        <td><?php echo $dados['descricao_servicos']?></td>
                        <td><?php echo $dados['valor_total_servicos']?></td>
                        <td><?php echo $dados['descricao_produtos']?></td>
                        <td><?php echo $dados['valor_total_produtos']?></td>
                        <td><?php echo $dados['data']?></td>
                        <td><?php echo $dados['status']?></td>
                        <td><a href="editarOrcamento.php?id=<?php echo $dados['id']?>" class="btn black">Editar</a></td>
                        <td></td>

                    </tr>

                    <?php endwhile; ?>
                </tbody>
            </table>
            <br>
        </div>
    </div>
</div>


<?php
include_once 'includes/footer.php';
?>