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
  <title>Consulta de Orçamentos</title>
</head>

<body id="body">
  <div class="container">
    <nav class="navbar">
      <div class="nav_icon" onclick="toggleSidebar()">
        <i class="fa fa-bars" aria-hidden="true"></i>
      </div>
      <div class="navbar__left">
        <h2>Consulta Orçamento</h2>
      </div>
    </nav>

    <main>
      <div class="main__container">
        <!-- MAIN CARDS STARTS HERE -->
        <div class="main__cards">
          <div class="form">
            <form>
              <!--Inicia a coluna-->
              <label for="iClientePesq">Cliente</label>
              <input type="text" id="iClientePesq" name="nClienteOrcamentoCon" placeholder="Insira o cliente para pesquisa">

              <div class="columns">
                <div class="dates">
                  <div>
                    <label for="LabelsRadios" id="LabelsRadios">Data Inicial</label><br>
                    <input class="data" type="date" id="LabelsRadios" name="nDataInOrc" data-date="" data-date-format="DD MMMM YYYY" value="2021-01-01"><br>
                  </div>

                  <div>
                    <label for="iDataFin">Data Final</label>
                    <input class="data" type="date" id="iDataFin" name="nDataFimOrc" data-date="" data-date-format="DD MMM YYYY" value="<?php echo date("Y-m-d"); ?>">
                  </div>
                </div>

                <label for="nSttsOS" id="LabelsRadios">Status do Orçamento</label>

                <div class="wrapper" id="LabelsRadios">
                  <input type="radio" id="iTodos" name="nSttsOrcamento" value="0">
                  <label for="iTodos">Todos</label>
                  <input type="radio" id="iAprovado" name="nSttsOrcamento" value="1">
                  <label for="iAprovado">Aprovado</label>
                  <input type="radio" id="iNaoAprovado" name="nSttsOrcamento" value="2">
                  <label for="iNaoAprovado">Não Aprovado</label>
                  <input type="radio" id="iAguardandoAprovacao" name="nSttsOrcamento" value="3" checked>
                  <label for="iAguardandoAprovacao">Aguardando aprovação</label>

                </div>
              </div>

              <br>
              <br>

              <div class="btn-group">
                <button name="nPesquisarOrcamentoCon" value="Enviar" class="btn">Pesquisar</button>

                <button type="reset" name="nLimparOrcamentoCon" value="Limpar" class="btn">Limpar</button>
              </div>

              <br>
              <br>

              <table rules=all>
                <tr>
                  <th>Nº Orçamento</th>
                  <th>Código Cliente</th>
                  <th>Nome Cliente</th>
                  <th>Código Carro</th>
                  <th>Placa do Carro</th>
                  <th>Descrição Serviço</th>
                  <th>Preço Mão de Obra</th>
                  <th>Preço Total</th>
                  <th>Data Orçamento</th>
                  <th>Status</th>
                  <th>Tipo Manutenção</th>
                  <th id="IListaeProcurar"></th>
                </tr>
                <tr>
                  <?php

                  if (isset($_GET['nPesquisarOrcamentoCon']) and $_GET['nSttsOrcamento'] > 0) {
                    $nomeCliente = limpezaVariavel($_GET['nClienteOrcamentoCon']);
                    $dataFinal = limpezaVariavel($_GET['nDataFimOrc']);
                    $dataInicial = limpezaVariavel($_GET['nDataInOrc']);
                    $status = limpezaVariavel($_GET['nSttsOrcamento']);
                    $sql = "SELECT orc.id as orcamento_id,cli.id as cliente_id,cli.nome AS cliente_nome,car.id AS carro_id,car.placa AS carro_placa,orc.descricao_servicos,orc.valor_total_produtos,orc.valor_total_servicos,orc.tipoManutencao,
                                orc.data, orc.status FROM orcamentos orc
                                INNER JOIN clientes cli ON orc.clientes_id = cli.id
                                INNER JOIN carros car ON orc.carros_id = car.id
                                WHERE orc.data BETWEEN '$dataInicial' AND '$dataFinal'
                                AND orc.status = '$status'
                                AND cli.nome LIKE '%$nomeCliente%'";

                      global $connect;
                      $resultado = mysqli_query($connect, $sql);
                      while ($dados = mysqli_fetch_array($resultado)) :
                          echo '<td>' . $dados['orcamento_id'] . '</td>';
                          echo '<td>' . $dados['cliente_id'] . '</td>';
                          echo '<td>' . $dados['cliente_nome'] . '</td>';
                          echo '<td>' . $dados['carro_id'] . '</td>';
                          echo '<td>' . $dados['carro_placa'] . '</td>';
                          echo '<td>' . $dados['descricao_servicos'] . '</td>';
                          echo '<td>' . 'R$ ' . $dados['valor_total_servicos'] . '</td>';
                          echo '<td>' . 'R$ ' .  $dados['valor_total_produtos'] . '</td>';
                          echo '<td>' . $dados['data'] . '</td>';
                          if ($dados['status'] == 1) {
                              echo '<td> Aprovado </td>';
                          } elseif ($dados['status'] == 2) {
                              echo '<td> Não Aprovado</td>';
                          } elseif ($dados['status'] == 3) {
                              echo '<td> Aguardando Aprovação</td>';
                          }else{
                              echo '<td></td>';
                          }
                          if ($dados['tipoManutencao'] == 1) {
                              echo '<td> Manutenção Corretiva </td>';
                          } elseif ($dados['tipoManutencao'] == 2) {
                              echo '<td> Manutenção Preventiva </td>';
                          }else{
                              echo '<td></td>';
                          }

                          echo '<td id="iCantoBotao">';

                          if ($dados['status'] != 1) {
                            echo '<a href="Cadastro-OS.php?id=' . $dados['orcamento_id'] . '" id="GerarOS"><i class="fa fa-list " aria-hidden="true"></i></a>';
                          }
                          echo '<a href="VerMais/orcamento.php?id=' . $dados['orcamento_id'] . '" id="VerMaisOrcamento"><i class="fa fa-search-plus" aria-hidden="true"></i></a>';


                          echo '</td>';
                          echo '</tr>';
                      endwhile;
                  }else if(isset($_GET['nPesquisarOrcamentoCon']) and $_GET['nSttsOrcamento'] == 0){
                      $sql = "SELECT orc.id as orcamento_id,cli.id as cliente_id,cli.nome AS cliente_nome,car.id AS carro_id,car.placa AS carro_placa,orc.descricao_servicos,orc.valor_total_produtos,orc.valor_total_servicos,orc.tipoManutencao,
                                orc.data, orc.status FROM orcamentos orc
                                INNER JOIN clientes cli ON orc.clientes_id = cli.id
                                INNER JOIN carros car ON orc.carros_id = car.id
                                ";

                      global $connect;
                      $resultado = mysqli_query($connect, $sql);
                      while ($dados = mysqli_fetch_array($resultado)) :
                          echo '<td>' . $dados['orcamento_id'] . '</td>';
                          echo '<td>' . $dados['cliente_id'] . '</td>';
                          echo '<td>' . $dados['cliente_nome'] . '</td>';
                          echo '<td>' . $dados['carro_id'] . '</td>';
                          echo '<td>' . $dados['carro_placa'] . '</td>';
                          echo '<td>' . $dados['descricao_servicos'] . '</td>';
                          echo '<td>' . 'R$ ' . $dados['valor_total_servicos'] . '</td>';
                          echo '<td>' . 'R$ ' .  $dados['valor_total_produtos'] . '</td>';
                          echo '<td>' . $dados['data'] . '</td>';
                          if ($dados['status'] == 1) {
                              echo '<td> Aprovado </td>';
                          } elseif ($dados['status'] == 2) {
                              echo '<td> Não Aprovado</td>';
                          } elseif ($dados['status'] == 3) {
                              echo '<td> Aguardando Aprovação</td>';
                          }
                          if ($dados['tipoManutencao'] == 1) {
                              echo '<td> Manutenção Corretiva </td>';
                          } elseif ($dados['tipoManutencao'] == 2) {
                              echo '<td> Manutenção Preventiva </td>';
                          }

                          echo '<td id="iCantoBotao">';

                          if ($dados['status'] != 1) {
                            echo '<a href="Cadastro-OS.php?id=' . $dados['orcamento_id'] . '" id="GerarOS" style="padding-right: 25px;"><i class="fa fa-list" aria-hidden="true"></i></a>';
                          }
                          echo '<a href="VerMais/orcamento.php?id=' . $dados['orcamento_id'] . '" id="VerMaisOrcamento"><i class="fa fa-search-plus" aria-hidden="true"></i></a>';


                          echo '</td>';
                          echo '</tr>';
                      endwhile;
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
