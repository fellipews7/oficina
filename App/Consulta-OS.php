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
  <title>Consulta Ordem de Serviços</title>
</head>

<body id="body">
  <div class="container">
    <nav class="navbar">
      <div class="nav_icon" onclick="toggleSidebar()">
        <i class="fa fa-bars" aria-hidden="true"></i>
      </div>
      <div class="navbar__left" id="os-title">
        <h2>Consulta Ordem de Serviço</h2>
      </div>
    </nav>

    <main>
      <div class="main__container">
        <!-- MAIN CARDS STARTS HERE -->
        <div class="main__cards">
          <div class="form">
            <form method="post" action="">
              <!--Inicia a coluna-->
              <label for="iClientePesq">Cliente</label>
              <input type="text" id="iClientePesq" name="nClienteOSCon" placeholder="Insira o cliente para pesquisa">
              <label for="iFuncionarioPes">Funcionário</label>
              <input type="text" id="iFuncionarioPes" name="nFuncionarioOSCon" placeholder="Insira o funcionário responsável para pesquisa">
              <div class="columns">

                <div class="column 1">
                  <div class="dates">
                    <div>
                      <label for="LabelsRadios" id="LabelsRadios">Data Inicial</label><br>
                      <input class="data" type="date" id="LabelsRadios" name="nDataInOS" data-date="" data-date-format="DD MMMM YYYY" value="2020-01-01">
                    </div>

                    <div>
                      <label for="iDataFin">Data Final</label>
                      <input class="data" type="date" id="iDataFin" name="nDataFimOS" data-date="" data-date-format="DD MMMM YYYY" value="<?php echo date("Y-m-d"); ?>">
                    </div>
                  </div>

                  <label for="nSttsOS" id="LabelsRadios">Status da Ordem de Serviço</label>
                  <div class="wrapper" id="LabelsRadios">
                    <input type="radio" id="iConcluido" name="nSttsOS" value="1">
                    <label for="iConcluido">Concluido</label>
                    <input type="radio" id="iAndamento" name="nSttsOS" value="2">
                    <label for="iAndamento">Andamento</label>
                    <input type="radio" id="iAtraso" name="nSttsOS" value="3">
                    <label for="iAtraso">Atraso</label>
                    <input type="radio" id="iTodos" name="nSttsOS" value="4" checked>
                    <label for="iTodos">Todos</label>
                  </div>
                </div>
              </div>

              <br>
              <br>

              <div class="btn-group">
                <button name="nPesquisarOSCon" value="Enviar" class="btn">Pesquisar</button>

                <button type="reset" name="nLimparOSCon" value="Limpar" class="btn">Limpar</button>
              </div>

              <br>
              <br>

              <table rules=all>
                <tr>
                  <th>Nº OS</th>
                  <th>Nº Orçamento</th>
                  <th>Cliente</th>
                  <th>Carro</th>
                  <th>Data Cadastro</th>
                  <th>Data Prevista</th>
                  <th>Funcionário</th>
                  <th>Status</th>
                  <th></th>
                </tr>
                <tr>
                  <?php
                  $sql = "";
                  if (isset($_POST['nPesquisarOSCon']) and (isset($_POST['nSttsOS']) and $_POST['nSttsOS'] != 4)){
                    $cliente = limpezaVariavel($_POST['nClienteOSCon']);
                    $funcionario = limpezaVariavel($_POST['nFuncionarioOSCon']);
                    $data_cadastro_ini = limpezaVariavel($_POST['nDataInOS']);
                    $data_cadastro_fim = limpezaVariavel($_POST['nDataFimOS']);
                    $status = limpezaVariavel($_POST['nSttsOS']);

                    $sql = "SELECT so.id AS so_id, so.orcamentos_id AS orc_id, cl.nome AS cl_nome, ca.modelo AS ca_modelo, 
                          so.data_cadastro AS so_data_cadastro, so.data_previsao AS so_data_previsao, func.nome AS func_nome, 
                          so.status AS status FROM orcamentos AS orc 
                          INNER JOIN ordens_de_servicos AS so ON so.orcamentos_id = orc.id 
                          INNER JOIN clientes AS cl ON orc.clientes_id = cl.id 
                          INNER JOIN funcionarios AS func ON so.funcionarios_matricula = func.matricula 
                          INNER JOIN carros AS ca ON orc.carros_id = ca.id
                          WHERE cl.nome LIKE '%$cliente%' AND func.nome LIKE '%$funcionario%' 
                          AND so.data_cadastro BETWEEN '$data_cadastro_ini' and '$data_cadastro_fim'";

                      global $connect;
                      $resultado = mysqli_query($connect, $sql);
                      while ($dados = mysqli_fetch_array($resultado)) :
                          echo '<tr>';
                          echo '<td>' . $dados['so_id'] . '</td>';
                          echo '<td>' . $dados['orc_id'] . '</td>';
                          echo '<td>' . $dados['cl_nome'] . '</td>';
                          echo '<td>' . $dados['ca_modelo'] . '</td>';
                          echo '<td>' . $dados['so_data_cadastro'] . '</td>';
                          echo '<td>' . $dados['so_data_previsao'] . '</td>';
                          echo '<td>' . $dados['func_nome'] . '</td>';

                          if ($dados['status'] == 1) {
                              echo '<td> Em aberto</td>';
                          } else if ($dados['status'] == 2) {
                              echo '<td> Concluída </td>';
                          } else if ($dados['status'] == 3) {
                              echo '<td> Atrasada </td>';
                          }

                          echo '<td id="iCantoBotao">';

                          echo '<a href="VerMais/OS.php?id=' . $dados['so_id'] . '" id="VerMaisOS"><i class="fa fa-search-plus" aria-hidden="true"></i></a>';

                          echo '</td>';
                          echo '</tr>';
                      endwhile;

                  }else if(isset($_POST['nPesquisarOSCon']) and ($_POST['nSttsOS'] == 4)){
                      $sql = "SELECT so.id AS so_id, so.orcamentos_id AS orc_id, cl.nome AS cl_nome, ca.modelo AS ca_modelo, 
                          so.data_cadastro AS so_data_cadastro, so.data_previsao AS so_data_previsao, func.nome AS func_nome, 
                          so.status AS status FROM orcamentos AS orc 
                          INNER JOIN ordens_de_servicos AS so ON so.orcamentos_id = orc.id 
                          INNER JOIN clientes AS cl ON orc.clientes_id = cl.id 
                          INNER JOIN funcionarios AS func ON so.funcionarios_matricula = func.matricula 
                          INNER JOIN carros AS ca ON orc.carros_id = ca.id";

                      global $connect;
                      $resultado = mysqli_query($connect, $sql);
                      while ($dados = mysqli_fetch_array($resultado)) :
                          echo '<tr>';
                          echo '<td>' . $dados['so_id'] . '</td>';
                          echo '<td>' . $dados['orc_id'] . '</td>';
                          echo '<td>' . $dados['cl_nome'] . '</td>';
                          echo '<td>' . $dados['ca_modelo'] . '</td>';
                          echo '<td>' . $dados['so_data_cadastro'] . '</td>';
                          echo '<td>' . $dados['so_data_previsao'] . '</td>';
                          echo '<td>' . $dados['func_nome'] . '</td>';

                          if ($dados['status'] == 1) {
                              echo '<td> Em aberto</td>';
                          } else if ($dados['status'] == 2) {
                              echo '<td> Concluída </td>';
                          } else if ($dados['status'] == 3) {
                              echo '<td> Atrasada </td>';
                          }

                          echo '<td id="iCantoBotao">';

                          echo '<a href="VerMais/OS.php?id=' . $dados['so_id'] . '" id="VerMaisOS"><i class="fa fa-search-plus" aria-hidden="true"></i></a>';

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
