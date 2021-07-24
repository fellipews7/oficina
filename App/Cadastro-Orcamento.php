<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
if (isset($_SESSION['login']) and $_SESSION['login'] == 1) {
  require_once 'connection.php';
?>

  <!DOCTYPE html>

  <html lang="pt-br">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link rel="stylesheet" href="assets/css/Cadastro.css" />
    <title>Cadastro de Orçamentos</title>
  </head>

  <body id="body">
    <?php
    include_once 'assets/php/mensagem.php';
    ?>
    <div class="container">
      <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <h2>Cadastro Orçamento</h2>
        </div>
      </nav>

      <main>
        <div class="main__container">
          <!-- MAIN CARDS STARTS HERE -->
          <div class="main__cards">
            <div class="form custom-class">
              <form action="cadastro.php" method="post">
                <div class="inputs-form">
                  <div class="column one">

                    <label for="iIDCLiente">Selecione o Cliente</label>
                    <select class="select" id="iIDCLiente" name="nIDCLienteOrcamento" style="width:250px">
                      <?php $sql = "SELECT id as id, nome as nome FROM clientes";

                      $resultado = mysqli_query($connect, $sql);
                      while ($dados = mysqli_fetch_array($resultado)) {
                        echo "<option value=" . $dados['id'] . ">" . $dados['nome'] . ' - ' . $dados['id'] . "</option>";
                      }
                      ?>
                    </select><br>

                    <label for="iDescricaoServico">Descrição do Serviço</label>
                  <textarea name="nDescricaoServico" id="iDescricaoServico" placeholder="Insira a descrição do serviço feito" cols="90" rows="5" maxlength="65500" onkeydown="countChar(this, 'counterServico')"></textarea>
                  <small id="counterServico" class="caracteresRestantes"></small>


                  <label for="iDescricaoProduto">Descrição dos Produtos</label>
                  <textarea name="nDescricaoProduto" id="iDescricaoProduto" placeholder="Insira a descrição dos produtos usados" cols="90" rows="5" maxlength="65500" onkeydown="countChar(this, 'counterProduto')"></textarea>
                  <small id="counterProduto" class="caracteresRestantes"></small>

                    <label for="nTipoManu">Tipo Manutenção</label>
                    <div id="classificacaoCliente">
                      <!-- Wrapper para trabalhar com input e label dentro de uma div  -->
                      <div class="wrapper">
                        <input type="radio" id="iCorretiva" name="nTipoManu" value="1">
                        <label for="iCorretiva">Corretiva</label>
                        <input type="radio" id="iPreventiva" name="nTipoManu" value="2">
                        <label for="iPreventiva">Preventiva</label>
                      </div>
                    </div>
                  </div>

                    <div class="column two">
                      <label for="iIDCarro">Selecione o Carro</label>
                      <select id="iIDCarro" class="select" name="nIDCarroOrcamento" style="width:250px">
                        <?php $sql = "SELECT id as id, placa as placa,modelo as modelo, marca FROM carros";
                        $resultado = mysqli_query($connect, $sql);
                        while ($dados = mysqli_fetch_array($resultado)) {
                          echo "<option value=" . $dados['id'] . ">" . $dados['placa'] . ' | ' . $dados['marca'] . ' - ' . $dados['modelo'] .  "</option>";
                        }
                        ?>
                      </select><br>

                      <label for="iPrecoMaoObra">Preço Mão de Obra</label><br>
                      <input type="text" id="iPrecoMaoObra" name="nPrecoMaoObraOrcamento" placeholder="Insira o preço da mão de obra" style="width: 420px;"><br>

                      <label for="iPreçoTotalPro">Preço Total de Produtos</label><br>
                      <input type="text" id="iPreçoTotalPro" name="nPrecoTotalProOrcamento" placeholder="Insira o preço preço total dos produtos" style="width: 420px;">


                    </div>

                  </div>

                  <div class="btn-group custom-class">
                    <button type="submit" name="nCadastrarOrcamento" class="btn">Cadastrar</button>
                    <button type="reset" name="nLimparOrcamento" class="btn">Limpar</button>
                  </div>

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

} else {
    $_SESSION['tipoErro'] = 'Por favor faça login!';
    $_SESSION['mensagem'] = 'erro';
    header('location: ../index.php');
}
