<html xmlns="http://www.w3.org/1999/xhtml">

<?php
require_once 'connection.php';
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="assets/css/VerMaisOrcamento.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <script src="assets/js/jquery-3.1.1.min.js"></script>
    <script src="assets/js/jsmenu.js"></script>

    <title>Mecanica Schulz</title>
</head>

<body width="100%" height="100%" id="Fundo" background="assets/img/Fundo.png">

<div class="container">
    <div class="form">
        <a href="consulta_orcamento.php" id="RetornarConsultaOrcamento">Retornar</a> <h1>Consulta do Orçamento</h1>
        <form>
            <table rules=all>
                <tr>
                    <th>ID Orçamento</th>
                    <th>ID Cliente</th>
                    <th>ID Carro</th>
                    <th>ID Serviço</th>
                    <th>Descrição Orçamento</th>
                    <th>Descrição Serviço</th>
                    <th>Descrição Produto</th>
                    <th>Quantidade</th>
                    <th>Preço Mão de Obra</th>
                    <th>Preço Total</th>
                    <th>Data Orçamento</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                <?php
                $id = ($_GET['id']);

                $sql = "SELECT * FROM orcamentos WHERE id = '$id'";
                $resultado =mysqli_query($connect, $sql);
                while($dados = mysqli_fetch_array($resultado)) {
                    $precoTotal = $dados['valor_total_produtos']+$dados['valor_total_servicos'];
                    echo '<td>'.$dados['id'].'</td>';
                    echo '<td>'.$dados['clientes_id'].'</td>';
                    echo '<td>'.$dados['carros_id'].'</td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td>'.$dados['descricao_servicos'].'</td>';
                    echo '<td>'.$dados['descricao_produtos'].'</td>';
                    echo '<td></td>';
                    echo '<td>'.$dados['valor_total_servicos'].'</td>';
                    echo '<td> R$ '.$precoTotal.'</td>';
                    echo '<td>'.$dados['data'].'</td>';
                    echo '<td>'.$dados['status'].'</td>';

                    echo '<td id="iCantoBotao">';

                        echo '<a href="#" id="EditarCliente">Editar</a>';

                    echo '</td>';
                }
                ?>
                </tr>
            </table>
        </form>
    </div>
</div>
<footer>
    <p>&copy; Developed by Igária ltda</p>
</footer>
</body>

</html>