<?php
include_once 'includes/header.php';
require_once 'phpaction/db_connect.php';
include_once 'includes/mensagem.php';
?>

<div  class="row">
    <div class="col s12 m6 push-m3">
    <a href="../Consulta-OS.php" class="btn black">Retornar</a><h3 class="light">Clientes</h3>
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
                <th>Quilometragem<th>
                <th>Matricula funcionario<th>
                <th>Tipo manutenção<th>
                <th>Status<th>
                <th></th>
            </thead>

            <tbody>
                <?php
                    $sql = "SELECT * FROM clientes";
                    $resultado = mysqli_query($connect, $sql);
                    while($dados = mysqli_fetch_array($resultado)):
                ?>
                <tr>
                    <td><?php echo $dados['ID OS']?></td>
                    <td><?php echo $dados['ID Orcamento']?></td>
                    <td><?php echo $dados['ID Cliente']?></td>
                    <td><?php echo $dados['ID Carro']?></td>
                    <td><?php echo $dados['Descricao Produtos']?></td>
                    <td><?php echo $dados['Valor Produtos']?></td>
                    <td><?php echo $dados['Descricao Serviços']?></td>
                    <td><?php echo $dados['Valor Serviços']?></td>
                    <td><?php echo $dados['Data Cadastro']?></td>
                    <td><?php echo $dados['Data Previsao']?></td>
                    <td><?php echo $dados['Data Entrega']?></td>
                    <td><?php echo $dados['Valor Total']?></td>
                    <td><?php echo $dados['Quilometragem']?></td>
                    <td><?php echo $dados['Matricula Funcionario']?></td>
                    <td><?php echo $dados['Tipo Manutencao']?></td>
                    <td><?php echo $dados['Status']?></td>
                    <td><a href="editar.php?id=<?php echo $dados['id']?>" class="btn black"><i class="material-icons">Editar</i> </a></td>
                    

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