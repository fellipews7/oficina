<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include_once 'connection.php';
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="assets/css/VerMaisCliente.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <script src="assets/js/jquery-3.1.1.min.js"></script>
    <script src="assets/js/jsmenu.js"></script>

    <title>Mecanica Schulz</title>
</head>

<body width="100%" height="100%" id="Fundo" background="assets/img/Fundo.png">

<div class="container">
    <div class="form">
        <a href="consulta_cliente.php" id="RetornarConsultaCliente">Retornar</a> <h1>Consulta do Cliente</h1>
        <form>
            <table rules=all>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>CPF/CNPJ</th>
                    <th>Email</th>
                    <th>Data Nascimento</th>
                    <th>Estado</th>
                    <th>Municipio</th>
                    <th>Endereço</th>
                    <th></th>
                </tr>
                <tr>
                    <?php
                    $id = ($_GET['id']);

                    $sql = "SELECT * FROM clientes WHERE id = '$id'";
                    var_dump($sql);
                    $resultado =mysqli_query($connect, $sql);
                    while($dados = mysqli_fetch_array($resultado)) {
                        echo '<td>'.$dados['id'].'</td>';
                        echo '<td>'.$dados['nome'].'</td>';
                        echo '<td>'.$dados['telefone'].'</td>';
                        echo '<td>'.$dados['cpf'].$dados['cnpj'].'</td>';
                        echo '<td>'.$dados['email'].'</td>';
                        echo '<td>'.$dados['data_nascimento'].'</td>';
                        echo '<td>'.$dados['estado'].'</td>';
                        echo '<td>'.$dados['municipio'].'</td>';
                        echo '<td>'.$dados['logradouro'].'</td>';


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