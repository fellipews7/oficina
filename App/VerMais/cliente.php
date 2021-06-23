<?php
include_once 'includes/header.php';
require_once '../connection.php';
include_once 'includes/mensagem.php';
?>

<div  class="row">
    <div class="col s12 m6 push-m3">
    <a href="../Consulta-Cliente.php" class="btn black">Retornar</a><h3 class="light">Clientes</h3>
        <table class="striped">
            <thead>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>CPF/CNPJ</th>
                    <th>Email</th>
                    <th>Data Nascimento</th>
                    <th>Estado</th>
                    <th>Municipio</th>
                    <th>Endereço</th> 
            </thead>

            <tbody>
                <?php
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM clientes WHERE id = '$id'";
                    $resultado = mysqli_query($connect, $sql);
                    while($dados = mysqli_fetch_array($resultado)):
                ?>
                <tr>
                    <td><?php echo $dados['id']?></td>
                    <td><?php echo $dados['nome']?></td>
                    <td><?php echo $dados['telefone']?></td>
                    <td><?php echo $dados['cpf']. $dados['cnpj']?></td>
                    <td><?php echo $dados['email']?></td>
                    <td><?php echo $dados['data_nascimento']?></td>
                    <td><?php echo $dados['estado']?></td>
                    <td><?php echo $dados['municipio']?></td>
                    <td><?php echo $dados['logradouro']. ',' .$dados['numero_logradouro']?></td>
                    <td><a href="editarCliente.php?id=<?php echo $dados['id']?>" class="btn black">Editar </a></td>
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