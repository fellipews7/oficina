<?php
include_once 'includes/header.php';
require_once '../connection.php';
include_once 'includes/mensagem.php';
?>

    <div  class="row" >
        <div class="col s12 m6 push-m3">
            <a href="../Consulta-Cliente.php" class="btn black">Retornar</a><h3 class="light">Clientes</h3>
            <table class="striped">
                <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF/CNPJ</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Data Nascimento</th>
                <th>Estado</th>
                <th>Municipio</th>
                <th>Bairro</th>
                <th>Endereço</th>
                <th>Número</th>
                <th>Complemento</th>
                <th>Data Cadastro</th>

                </thead>

                <tbody>
                <?php
                $id = $_GET['id'];
                $sql = "SELECT * FROM clientes WHERE id = ".$id;
                $resultado = mysqli_query($connect, $sql);
                while($dados = mysqli_fetch_array($resultado)):
                    ?>
                    <tr>
                        <td><?php echo $dados['id']?></td>
                        <td><?php echo $dados['nome']?></td>
                        <td><?php echo $dados['cpf']. $dados['cnpj']?></td>
                        <td><?php echo $dados['email']?></td>
                        <td><?php echo $dados['telefone']?></td>
                        <td><?php echo $dados['data_nascimento']?></td>
                        <td><?php echo $dados['estado']?></td>
                        <td><?php echo $dados['municipio']?></td>
                        <td><?php echo $dados['bairro']?></td>
                        <td><?php echo $dados['logradouro']?></td>
                        <td><?php echo $dados['numero_logradouro']?></td>
                        <td><?php echo $dados['complemento_logradouro']?></td>
                        <td><?php echo $dados['data_cadastro']?></td>
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