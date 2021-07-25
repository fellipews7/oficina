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
  <title>Consulta de Clientes</title>
</head>

<body id="body">
<?php
  include_once 'assets/php/mensagem.php';
  include_once 'assets/php/sessoes.php';

  if (isset($_SESSION['setPesqCliente']) and $_SESSION['setPsqCliente'] = true) {
  } else {
    unsetPesqCliente();
  }
  ?>
  <div class="container">
    <nav class="navbar">
      <div class="nav_icon" onclick="toggleSidebar()">
        <i class="fa fa-bars" aria-hidden="true"></i>
      </div>
      <div class="navbar__left">
        <h2>Consulta Cliente</h2>
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
              <input type="text" id="iPalavraChave" name="nPalavraChaveClienteCon" placeholder="Insira a palavra chave para pesquisa" value="<?php echo $_SESSION['palavraChave'] ?>">
              <div class="columns">

                <div class="column 1">
                  <label for="nTipoPalavraChave" id="LabelsRadios">Tipo da Palavra Chave</label>

                  <div class="wrapper">
                    <input type="radio" id="Nome" name="nTipoPalavraChave" value="nome" checked>
                    <label for="Nome">Nome</label>
                    <input type="radio" id="CPF" name="nTipoPalavraChave" value="cpf">
                    <label for="CPF">CPF</label>
                    <input type="radio" id="Cidade" name="nTipoPalavraChave" value="municipio">
                    <label for="Cidade">Cidade</label>
                  </div>
                </div>
              </div>

              <br>
              <br>
              <script>
                document.getElementById("Cadastrar").onclick = function() {
                  <?php setPesqCliente(); ?>

                }

                document.getElementById("Limpar").onclick = function() {
                  <?php unsetPesqCliente(); ?>

                }
              </script>

              <div class="btn-group">
                <button name="nPesquisarClienteCon" value="Enviar" class="btn">Pesquisar</button>

                <button type="reset" name="nLimparClienteCon" value="Limpar" class="btn">Limpar</button>
              </div>

              <br>
              <br>

              <table rules=all>
                <thead>
                  <th>Código</th>
                  <th>Nome</th>
                  <th>Endereço</th>
                  <th>Telefone</th>
                  <th>CPF</th>
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
                      echo '<td>' . $dados['id'] . '</td>';
                      echo '<td>' . $dados['nome'] . '</td>';
                      echo '<td>' . $dados['logradouro'] . ', ' . $dados['numero_logradouro'] . '</td>';
                      echo '<td>' . $dados['telefone'] . '</td>';
                      echo '<td>' . $dados['cnpj'] . $dados['cpf'] . '</td>';
                      echo '<td id="iCantoBotao">';
                      echo '<a href="VerMais/cliente.php?id= ' . $dados["id"] . '" id="VerMaisCliente" name="nVerMaisCliente"><i class="fa fa-search-plus" aria-hidden="true"></i></a>';
                      echo '</td>';
                      echo '</tr>';
                    endwhile;
                  }
                  
                  if (isset($_GET['nPesquisarClienteCon'])) {
                    $tipoPalavraChave = limpezaVariavel($_GET['nTipoPalavraChave']);
                    $palavraChave = limpezaVariavel($_GET['nPalavraChaveClienteCon']);

                    $sql = "SELECT id, nome, logradouro, numero_logradouro, telefone, cpf, cnpj FROM clientes 
                                WHERE " . $tipoPalavraChave . " LIKE '$palavraChave%'";
                    insercaoDados($sql);
                  }
                  ?>
                </tr>
              </table>

          </div>
          <!--Acaba a coluna-->

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

