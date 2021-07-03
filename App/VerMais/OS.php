<?php
include_once 'includes/header.php';
require_once '../connection.php';

?>

<div  class="row">
    <div class="col s12 m6 push-m3">
    <a href="../Consulta-OS.php" class="btn black">Retornar</a><h3 class="light">Ordem de serviços</h3>
        <table class="striped">
            <thead>
                <th>ID Ordem de Serviço</th>
                <th>ID Orçamento<th>
                <th>ID Cliente<th>
                <th>ID Carro<th>
                <th>Descrição Produtos<th>
                <th>Valor Produtos<th>
                <th>Descrição Serviços<th>
                <th>Valor Serviços<th>
                <th>Data Cadastro<th>
                <th>Data Previsão<th>
                <th>Data Entrega<th>
                <th>Valor total<th>
                <th>Matricula funcionario<th>
                <th>Tipo manutenção<th>
                <th>Status<th>
            </thead>

            <tbody>
                <?php
                    $id = $_GET['id'];
                    $sql = "SELECT os.id AS id, os.orcamentos_id AS orcamentos_id, orc.clientes_id AS clientes_id,
                            orc.carros_id AS carros_id, orc.descricao_produtos AS descricao_produtos, orc.valor_total_produtos AS valor_total_produtos,
                            orc.descricao_servicos AS descricao_servicos, orc.valor_total_servicos AS valor_total_servicos,
                            os.data_cadastro AS data_cadastro, os.data_previsao AS data_previsao, os.data_conclusao AS data_entrega,
                            os.valor_final AS valor_final, os.status AS status FROM ordens_de_servicos AS os 
                            INNER JOIN orcamentos AS orc ON orc.id = os.orcamentos_id
                            WHERE os.id = '$id'";
                    $resultado = mysqli_query($connect, $sql);
                    while($dados = mysqli_fetch_array($resultado)):
                ?>
                <tr>
                    <td><?php echo $dados['id']?></td>
                    <td><?php echo $dados['orcamentos_id']?></td>
                    <td><?php echo $dados['clientes_id']?></td>
                    <td><?php echo $dados['carros_id']?></td>
                    <td><?php echo $dados['descricao_produtos']?></td>
                    <td><?php echo $dados['valor_total_produtos']?></td>
                    <td><?php echo $dados['descricao_servicos']?></td>
                    <td><?php echo $dados['valor_total_servicos']?></td>
                    <td><?php echo $dados['data_cadastro']?></td>
                    <td><?php echo $dados['data_previsao']?></td>
                    <td><?php echo $dados['data_entrega']?></td>
                    <td><?php echo $dados['valor_final']?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?php echo $dados['status']?></td>
                </tr>
            </tbody>
        </table>

        <div class="center-align margin top-20">
            <a href="editarOS.php?id=<?php echo $dados['id']?>" class="btn black">Editar </a>
            <a href="ImprimirOS.php?id=<?php echo $dados['id']?>" class="btn black">Imprimir </a>
        </div>
        <?php endwhile; ?>
    </div>
</div>



<?php
include_once 'includes/footer.php';
?>