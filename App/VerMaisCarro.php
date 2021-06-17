<html xmlns="http://www.w3.org/1999/xhtml">
<?php
    include_once 'connection.php';
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="assets/css/VerMaisCarro.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <script src="assets/js/jquery-3.1.1.min.js"></script>
    <script src="assets/js/jsmenu.js"></script>

    <title>Mecanica Schulz</title>
</head>

<body width="100%" height="100%" id="Fundo" background="assets/img/Fundo.png">

<div class="container">
    <div class="form">
        <a href="consulta_carros.php" id="RetornarConsultaCarro">Retornar</a> <h1>Consulta do Carro</h1>
        <form>
            <table rules=all>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Proprietário</th>
                        <th>Placa</th>
                        <th>Modelo</th>
                        <th>Marca</th>
                        <th>Renavam</th>
                        <th>Ano Modelo</th>
                        <th>Ano Fabricação</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php
                        $id = ($_GET['id']);

                        $sql = "SELECT * FROM carros WHERE id = '$id'";
                        $resultado =mysqli_query($connect, $sql);
                        while($dados = mysqli_fetch_array($resultado)){
                    ?>
                            <td><?php echo $dados['id']?></td>
                            <td><?php echo $dados['placa']?></td>
                            <td><?php echo $dados['modelo']?></td>
                            <td><?php echo $dados['marca']?></td>
                            <td><?php echo $dados['renavam']?></td>
                            <td><?php echo $dados['ano_modelo']?></td>
                            <td><?php echo $dados['ano_fabricado']?></td>
                            <td id="iCantoBotao">

                                <a href="VerMaisCarro/index.php?id=<?php echo $dados['id'] ?>" id="EditarCarro">Editar</a>

                            </td>
                    <?php
                        }
                    ?>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>
<footer>
    <p>&copy; Developed by Igária ltda</p>
</footer>
</body>

</html>