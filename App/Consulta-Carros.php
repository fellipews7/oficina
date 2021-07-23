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

  <link rel="stylesheet" href="assets/css/styles.css" />
  <link rel="stylesheet" href="assets/css/Consulta.css" />
  <title>Consulta de Carros</title>
</head>

<body id="body">
  <?php
  require_once 'assets/php/funcao.php';
  require_once 'connection.php';
  ?>
  <div class="container">
    <nav class="navbar">
      <div class="nav_icon" onclick="toggleSidebar()">
        <i class="fa fa-bars" aria-hidden="true"></i>
      </div>
      <div class="navbar__left">
        <h2>Consulta Carro</h2>
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
              <input type="text" id="iPalavraChave" name="nPalavraChaveCarroCon" placeholder="Insira a palavra chave para pesquisa">
              <div class="columns">

                <div class="column 1">
                  <label for="nTipoPalavraChave" id="LabelsRadios">Tipo da Palavra Chave</label>

                  <div class="wrapper">
                    <input type="radio" id="iPlaca" name="nTipoPalavraChave" value="Placa" checked>
                    <label for="iPlaca">Placa</label>
                    <input type="radio" id="iModelo" name="nTipoPalavraChave" value="Modelo">
                    <label for="iModelo">Modelo</label>
                  </div>
                </div>
              </div>

              <br>
              <br>

              <div class="btn-group">
                <button name="nPesquisarCarroCon" value="Enviar" class="btn">Pesquisar</button>

                <button type="reset" name="nLimparCarroCon" value="Limpar" class="btn">Limpar</button>
              </div>

              <br>
              <br>

              <table rules=all>
                <thead>
                  <th>ID</th>
                  <th>Placa</th>
                  <th>Modelo</th>
                  <th>Ano Modelo</th>
                  <th>Ano Fabricado</th>
                  <th>Renavam</th>
                  <th></th>
                </thead>

                <tr>
                  <?php
                                    function insercaoDados($sql)
                                    {
                                      global $connect;
                                      $resultado = mysqli_query($connect, $sql);
                                      while ($dados = mysqli_fetch_array($resultado)) :
                  
                                        echo '<tr>';
                                        echo '<td> ' . $dados['id'] . '</td>';
                                        echo '<td>' . $dados['placa'] . '</td>';
                                        echo '<td>' . $dados['modelo'] . '</td>';
                                        echo '<td>' . $dados['ano_modelo'] . '</td>';
                                        echo '<td>' . $dados['ano_fabricado'] . '</td>';
                                        echo '<td>' . $dados['renavam'] . '</td>';
                                        echo '<td id="iCantoBotao">';
                                        echo '<a href="VerMais/carro?id=' . $dados['id'] . '" id="VerMaisCarro"><i class="fa fa-search-plus" aria-hidden="true"></i></a>';
                                        echo '</td>';
                                        echo '</tr>';
                  
                                      endwhile;
                                    }
                  if (isset($_GET['nPesquisarCarroCon'])) {
                    $palavraChave = limpezaVariavel($_GET['nPalavraChaveCarroCon']);
                    $tipoPalavraChave = limpezaVariavel($_GET['nTipoPalavraChave']);

                    $sql = "SELECT id, placa, modelo, ano_modelo, ano_fabricado,renavam FROM carros WHERE " . $tipoPalavraChave . " LIKE '$palavraChave%'";
                    insercaoDados($sql);
                  }


                  ?>
                </tr>
              </table>

          </div>


        </div>

        </form>

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

