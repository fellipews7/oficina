<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if(isset($_SESSION['login']) AND $_SESSION['login'] == 1){
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
  <?php
  require_once 'assets/php/funcao.php';
  require_once 'connection.php';
  ?>
  <link rel="stylesheet" href="assets/css/styles.css" />
  <link rel="stylesheet" href="assets/css/Consulta.css" />
  <title>Consulta de Funcionarios</title>
</head>

<body id="body">
  <div class="container">
    <nav class="navbar">
      <div class="nav_icon" onclick="toggleSidebar()">
        <i class="fa fa-bars" aria-hidden="true"></i>
      </div>
      <div class="navbar__left">
        <h2>Consulta Funcionário</h2>
      </div>
    </nav>

    <main>
      <div class="main__container">
        <!-- MAIN CARDS STARTS HERE -->
        <div class="main__cards">
          <div class="form">
            <form>
              <!--Inicia a coluna-->
              <label for="iPalavraChave">Palavra Chave</label>
              <input type="text" id="iPalavraChave" name="nPalavraChaveFuncionarioCon" placeholder="Insira a palavra chave para pesquisa">
              <div class="columns">

                <div class="column 1">
                  <label for="nTipoPalavraChave" id="LabelsRadios">Tipo da Palavra Chave</label>

                  <div class="wrapper">
                    <input type="radio" id="Nome" name="nTipoPalavraChave" value="nome" checked>
                    <label for="Nome">Nome</label>
                    <input type="radio" id="CPF" name="nTipoPalavraChave" value="cpf">
                    <label for="CPF">CPF</label>
                    <input type="radio" id="iCargo" name="nTipoPalavraChave" value="cargo">
                    <label for="iCargo">Cargo</label>
                  </div>
                </div>


              </div>

              <br>
              <br>

              <div class="btn-group">
                <button name="nPesquisarFuncionarioCon" value="Enviar" class="btn">Pesquisar</button>

                <button type="reset" name="nLimparFuncionarioCon" value="Limpar" class="btn">Limpar</button>
              </div>

              <br>
              <br>

              <table rules=all>
                <tr>
                  <th>Matricula</th>
                  <th>Cargo</th>
                  <th>Nome</th>
                  <th>Telefone</th>
                  <th></th>
                </tr>
                <?php

                function insercaoDados($sql)
                {
                  global $connect;
                  $resultado = mysqli_query($connect, $sql);
                  while ($dados = mysqli_fetch_array($resultado)) :
                    echo '<tr>';
                    echo '<td>' . $dados['matricula'] . '</td>';
                    echo '<td>' . $dados['cargo'] . '</td>';
                    echo '<td>' . $dados['nome'] . '</td>';
                    echo '<td>' . $dados['telefone'] . '</td>';
                    echo '<td id="iCantoBotao">';
                    echo '<a href="VerMais/funcionario.php?matricula= ' . $dados["matricula"] . '" id="VerMaisFuncionario" name="nVerMaisFuncionario"><i class="fa fa-search-plus" aria-hidden="true"></i></a>';
                    echo '</td>';
                    echo '</tr>';
                  endwhile;
                }

                if (isset($_GET['nPesquisarFuncionarioCon'])) {
                  $tipoPalavraChave = limpezaVariavel($_GET['nTipoPalavraChave']);
                  $palavraChave = limpezaVariavel($_GET['nPalavraChaveFuncionarioCon']);

                  if ($tipoPalavraChave <> 'cargo') {
                    $sql = "SELECT matricula, cargos.nome AS cargo, funcionarios.nome, telefone_contato AS telefone, cpf FROM funcionarios 
                            INNER JOIN cargos ON cargos.id = funcionarios.cargos_id 
                            WHERE funcionarios." . $tipoPalavraChave . " LIKE  '$palavraChave%'";
                  } elseif ($tipoPalavraChave) {
                    $sql = "SELECT func.matricula AS matricula, func.nome AS nome, func.telefone_contato AS telefone, func.cpf AS cpf, cargos.nome AS cargo 
                            FROM cargos AS cargos
                            INNER JOIN funcionarios AS func ON func.cargos_id = cargos.id
                            WHERE cargos.nome  LIKE '$palavraChave%'";
                  }

                  insercaoDados($sql);
                }
                ?>
                </tr>
              </table>

          </div>

          <br>
          <br>

          </form>
        </div>

      </div>
    </main>

    <?php include_once 'assets/php/menu.php'; ?>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script src="assets/js/script.js"></script>
</body>

</html>
<?php

}else{
    header('location: ../index.php');
    $_SESSION['tipoErro'] = 'Por favor faça login!';
    $_SESSION['mensagem'] = 'erro';
}

