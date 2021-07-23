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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
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
            <div class="form">
              <form action="cadastro.php" method="post">
                <div class="inputs-form">
                  <div class="column one">

                    <label for="iIDCLiente">Selecione o Cliente</label>
                    <select class="select" id="iIDCLiente" name="nIDCLienteOrcamento">
                      <?php $sql = "SELECT id as id, nome as nome FROM clientes";

                      $resultado = mysqli_query($connect, $sql);
                      while ($dados = mysqli_fetch_array($resultado)) {
                        echo "<option value=" . $dados['id'] . ">" . $dados['nome'] . ' - ' . $dados['id'] . "</option>";
                      }
                      ?>
                    </select><br>
                    <label for="iDescricaoServico">Descrição do Serviço</label>
                    <input type="text" id="iDescricaoServico" name="nDescricaoServico" placeholder="Insira a descrição do serviço feito">

                    <label for="iDescricaoProduto">Descrição dos Produtos</label>
                    <input type="text" id="iDescricaoProduto" name="nDescricaoProduto" placeholder="Insira a descrição dos produtos usados">

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
                    <select id="iIDCarro" class="select" name="nIDCarroOrcamento">
                      <?php $sql = "SELECT id as id, placa as placa,modelo as modelo, marca FROM carros";
                      $resultado = mysqli_query($connect, $sql);
                      while ($dados = mysqli_fetch_array($resultado)) {
                        echo "<option value=" . $dados['id'] . ">" . $dados['placa'] . ' | ' . $dados['marca'] . ' - ' . $dados['modelo'] .  "</option>";
                      }
                      ?>
                    </select><br>
                    <label for="iPrecoMaoObra">Preço Mão de Obra</label>
                    <input type="text" id="iPrecoMaoObra" name="nPrecoMaoObraOrcamento" class="form-control" onkeypress="$(this).mask('R$ 999.990,00')" placeholder="Insira o preço da mão de obra">

                      <script>
                          $(function teste(){
                              $('#iPrecoMaoObra').maskMoney({
                                  prefix:'R$ ',
                                  allowNegative: true,
                                  thousands:'.', decimal:',',
                                  affixesStay: true});
                          })
                      </script>



                    <label for="iPreçoTotalPro">Preço Total de Produtos</label>
                    <input type="text" id="iPreçoTotalPro" name="nPrecoTotalProOrcamento" class="form-control" onkeypress="$(this).mask('R$ 999.990,00')" placeholder="Insira o preço preço total dos produtos">

                      <script>
                          $(function teste1(){
                              $('#iPreçoTotalPro').maskMoney({
                                  prefix:'R$ ',
                                  allowNegative: true,
                                  thousands:'.', decimal:',',
                                  affixesStay: true});
                          })
                      </script>

                  </div>

                </div>

                <div class="btn-group">
                  <button type="submit" name="nCadastrarOrcamento" class="btn">Cadastrar</button>
                  <button type="reset" name="nLimparOrcamento" class="btn">Limpar</button>
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

} else {
    $_SESSION['tipoErro'] = 'Por favor faça login!';
    $_SESSION['mensagem'] = 'erro';
    header('location: ../index.php');
}
