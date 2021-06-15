<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="assets/css/VerMaisFuncionario.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <script src="assets/js/jquery-3.1.1.min.js"></script>
    <script src="assets/js/jsmenu.js"></script>

    <title>Mecanica Schulz</title>
</head>

<body width="100%" height="100%" id="Fundo" background="assets/img/Fundo.png">

<div class="container">

    <?php
    require_once 'connection.php';
    ?>

    <div class="form">
        <a href="consulta_funcionarios.php" id="RetornarConsultaFuncionario">Retornar</a> <h1>Consulta de Funcionário</h1>
        <form>
            <table rules=all>
                <tr>
                    <th>Matricula</th>
                    <th>Cargo</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>CPF</th>
                    <th></th>
                </tr>
                <tr>
                    <?php
                        $matricula = ($_GET['matricula']);
                        $sql = "SELECT c.nome AS cargo, f.nome AS nome, f.matricula AS matricula, 
                                f.telefone_contato AS telefone, f.cpf AS cpf FROM cargos AS c 
                                INNER JOIN funcionarios AS f ON c.id = f.cargos_id
                                WHERE matricula = '$matricula' ";
                        $resultado =mysqli_query($connect, $sql);
                        while($dados = mysqli_fetch_array($resultado)) {
                            echo '<td>'.$dados['matricula'].'</td>';
                            echo '<td>'.$dados['cargo'].'</td>';
                            echo '<td>'.$dados['nome'].'</td>';
                            echo '<td>'.$dados['telefone'].'</td>';
                            echo '<td>'.$dados['cpf'].'</td>';

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