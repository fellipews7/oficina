<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous"
    />
      <?php
      require_once 'assets/php/funcao.php';
      require_once 'connection.php';
      ?>
      <link rel="stylesheet" href="assets/css/styles.css" />
      <link rel="stylesheet" href="assets/css/Cadastro.css"/>
    <title>CSS GRID DASHBOARD</title>
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
        <input type="text" id="iClientePesq" name="nClienteOrcamentoCon"
        placeholder="Insira o cliente para pesquisa">
        
        <div class="columns">

          <div class="column 1">

            <label for="LabelsRadios" id="LabelsRadios">Data Inicial</label><br>
            <input class="data" type="date" id="LabelsRadios" name="nDataInOS" data-date=""
            data-date-format="DD MMMM YYYY" value="2000-01-01"><br>

            <label for="nSttsOS" id="LabelsRadios">Status do Orçamento</label>

            <div class="wrapper" id="LabelsRadios">
              <input type="radio" id="iAprovado" name="nSttsOrcamento" value="1">
              <label for="iAprovado">Aprovado</label>
              <input type="radio" id="iAguardando" name="nSttsOrcamento" value="2">
              <label for="iAguardando">Aguardando</label>
              <input type="radio" id="iCancelado" name="nSttsOrcamento" value="3">
              <label for="iCancelado">Cancelado</label>
            </div>
          </div>

          <div class="column 2">
            
            <label for="iDataFin">Data Final</label>
            <input class="data" type="date" id="iDataFin" name="nDataFinOS" data-date=""
            data-date-format="DD MMMM YYYY" value="2000-01-01">

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
            <th>ID Orçamento</th>
            <th>ID Cliente</th>
            <th>ID Carro</th> 
            <th>Descrição Serviço</th>
            <th>Preço Mão de Obra</th>
            <th>Preço Total</th> 
            <th>Data Orçamento</th> 
            <th>Status</th>
            <th>Tipo Manutenção</th>
          </tr>
          <tr>
              <?php
              if(isset($_GET['nPesquisarOrcamentoCon'])){
                  $nomeCliente = limpezaVariavel($_GET['nClienteOrcamentoCon']);
                  $dataFinal = limpezaVariavel($_GET['nDataFinOrc']);
                  $dataInicial = limpezaVariavel($_GET['nDataInOrc']);
                  $status = limpezaVariavel($_GET['nSttsOrcamento']);
                  $sql = "SELECT orc.id as orcamento_id,cli.id as cliente_id,car.id as carro_id,orc.descricao_servicos,orc.valor_total_servicos,
                                orc.data, orc.status FROM orcamentos orc
                                INNER JOIN clientes cli ON orc.clientes_id = cli.id
                                INNER JOIN carros car ON orc.carros_id = car.id
                                WHERE orc.data BETWEEN '$dataInicial' AND '$dataFinal'
                                AND orc.status = '$status'
                                AND cli.nome LIKE '%$nomeCliente%'";

                  insercaoDados($sql);
              }

              function insercaoDados($sql)
              {
                  global $connect;
                  $resultado = mysqli_query($connect, $sql);
                  while ($dados = mysqli_fetch_array($resultado)):
                      echo '<td>'. $dados['orcamento_id'] .'</td>';
                      echo '<td>'. $dados['cliente_id'] .'</td>';
                      echo '<td>'. $dados['carro_id'] .'</td>';
                      echo '<td></td>';
                      echo '<td>'. $dados['descricao_servicos'] .'</td>';
                      echo '<td>'. $dados['valor_total_servicos'] .'</td>';
                      echo '<td>'. $dados['data'] .'</td>';
                      echo '<td>'. $dados['status'] .'</td>';


                      echo '<td id="iCantoBotao">';

                        echo '<a href="VerMaisOrcamento/index.php" id="VerMaisOrcamento">Ver Mais</a>';
                        echo '<a href="Cadastro-OS.php" id="GerarOS">Gerar OS</a>';

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

      <div id="sidebar">
        <div class="sidebar__title">
          <div class="sidebar__img">
            <img src="assets/logo.png" alt="logo" />
            <h2>Oficina Schulz</h2>
          </div>
          <i
            onclick="closeSidebar()"
            class="fa fa-times"
            id="sidebarIcon"
            aria-hidden="true"
          ></i>
        </div>

    
        <div class="sidebar__menu">
        <div class="sidebar__link active_menu_link">
            <i class="fa fa-home"></i>
            <a href="index.php">Dashboard</a>
        </div>
        <h2>Cadastros</h2>
        <div class="sidebar__link">
                <i class="fa fa-user-secret" aria-hidden="true"></i>
                <a href="Cadastro-Cliente.php">Cadastro Cliente</a>
            </div>
            <div class="sidebar__link">
                <i class="fa fa-building-o"></i>
                <a href="Cadastro-Carro.php">Cadastro Carro</a>
            </div>
            <div class="sidebar__link">
                <i class="fa fa-wrench"></i>
                <a href="Cadastro-Orcamento.php">Cadastro Orçamento</a>
            </div>
            <div class="sidebar__link">
                <i class="fa fa-archive"></i>
                <a href="Cadastro-Funcionario.php">Cadastro Funcionário</a>
            </div>
            <div class="sidebar__link">
                <i class="fa fa-handshake-o"></i>
                <a href="Cadastro-Cargo.php">Cadastro Cargo</a>
            </div>
            <h2>Consultas</h2>
            <div class="sidebar__link">
                <i class="fa fa-question"></i>
                <a href="Consulta-Cliente.php">Consulta Cliente</a>
            </div>
            <div class="sidebar__link">
                <i class="fa fa-sign-out"></i>
                <a href="Consulta-Carros.php">Consulta Carro</a>
            </div>
            <div class="sidebar__link">
                <i class="fa fa-calendar-check-o"></i>
                <a href="Consulta-Orcamento.php">Consulta Orçamento</a>
            </div>
            <div class="sidebar__link">
                <i class="fa fa-files-o"></i>
                <a href="Consulta-OS.php">Consulta Ordem Serviço</a>
            </div>
            <div class="sidebar__link">
                <i class="fa fa-files-o"></i>
                <a href="Consulta-Funcionarios.php">Consulta Funcionario</a>
            </div>
            <div class="sidebar__logout">
                <i class="fa fa-power-off"></i>
                <a href="#">Log out</a>
            </div>
        </div>

      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="script.js"></script>
  </body>
</html>
