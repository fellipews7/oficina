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
      <link rel="stylesheet" href="assets/css/Consulta.css"/>
    <title>Oficina Schulz</title>
  </head>
  <body id="body">
    <div class="container">
      <nav class="navbar">
      <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <h2>Consulta Ordem de Serviço</h2>
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
        <input type="text" id="iClientePesq" name="nClienteOSCon"
        placeholder="Insira o cliente para pesquisa">
        <label for="iFuncionarioPes">Funcionário</label>
        <input type="text" id="iFuncionarioPes" name="nClienteOSCon"
        placeholder="Insira o funcionário responsável para pesquisa">
        <div class="columns">

          <div class="column 1">

            <label for="LabelsRadios" id="LabelsRadios">Data Inicial</label><br>
            <input class="data" type="date" id="LabelsRadios" name="nDataInOS" data-date=""
            data-date-format="DD MMMM YYYY" value="2000-01-01"><br>

            <label for="nSttsOS" id="LabelsRadios">Status da Ordem de Serviço</label>

            <div class="wrapper" id="LabelsRadios">
              <input type="radio" id="iConcluido" name="nSttsOS" value="1">
              <label for="iConcluido">Concluido</label>
              <input type="radio" id="iAndamento" name="nSttsOS" value="2">
              <label for="iAndamento">Andamento</label>
              <input type="radio" id="iAtraso" name="nSttsOS" value="3">
              <label for="iAtraso">Atraso</label>
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
            <th><a href="VerMaisOS/index.php" id="VerMaisCliente"><i class="fa fa-search-plus" aria-hidden="true"></i></a></th>
          </tr>
          <tr>
              <?php
              if(isset($_POST['nPesquisarOSCon'])){
                  $cliente = limpezaVariavel($_POST['nClienteOSCon']);
                  $funcionario = limpezaVariavel($_POST['nFuncionarioOSCon']);
                  $data_cadastro = limpezaVariavel($_POST['nDataFinOS']);
                  $status = limpezaVariavel($_POST['nSttsOS']);
                  $sql = "SELECT (so.id, so.orcamentos_id, cl.nome, ca.modelo, so.data_cadastro, so.data_previsao,func.nome,
                        so.status) FROM ordem_de_servico so INNER JOIN orcamentos AS orc ON orc.id = so.orcamentos_id
                        INNER JOIN clientes AS cl ON orc.clientes_id = cl.id
                        INNER JOIN funcionarios AS func ON os.funcionarios_matricula = func.matricula
                        WHERE cl.nome = '$cliente' AND func.nome = '$funcionario' AND so.data_cadastro = '$data_cadastro'";

                  insercaoDados($sql);
              }

              function insercaoDados($sql)
              {
                  global $connect;
                  $resultado = mysqli_query($connect, $sql);
                  while ($dados = mysqli_fetch_array($resultado)):
                      echo '<tr>';
                      echo '<td>'. $dados['so.id'] .'</td>';
                      echo '<td>'. $dados['so.orcamentos_id'] .'</td>';
                      echo '<td>'. $dados['cl.nome'] .'</td>';
                      echo '<td>'. $dados['ca.modelo'] .'</td>';
                      echo '<td>'. $dados['so.data_cadastro'] .'</td>';
                      echo '<td>'. $dados['so.data_previsao'] .'</td>';
                      echo '<td>'. $dados['func.nome'] .'</td>';
                      echo '<td>'. $dados['so.status'] .'</td>';


                      echo '<td id="iCantoBotao">';

                      echo '<a href="VerMaisOS/index.php" id="VerMaisCliente"><i class="fa fa-search-plus" aria-hidden="true"></i></a>';

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
                <i class="fa fa-user" aria-hidden="true"></i>
                <a href="Cadastro-Cliente.php">Cadastro Cliente</a>
            </div>
            <div class="sidebar__link">
                <i class="fa fa-car" aria-hidden="true"></i>
                <a href="Cadastro-Carro.php">Cadastro Carro</a>
            </div>
            <div class="sidebar__link">
                <i class="fa fa-money" aria-hidden="true"></i>
                <a href="Cadastro-Orcamento.php">Cadastro Orçamento</a>
            </div>
            <div class="sidebar__link">
                <i class="fa fa-users" aria-hidden="true"></i>
                <a href="Cadastro-Funcionario.php">Cadastro Funcionário</a>
            </div>
            <div class="sidebar__link">
                <i class="fa fa-briefcase" aria-hidden="true"></i>
                <a href="Cadastro-Cargo.php">Cadastro Cargo</a>
            </div>
            <h2>Consultas</h2>
            <div class="sidebar__link">
                <i class="fa fa-user" aria-hidden="true"></i>
                <a href="Consulta-Cliente.php">Consulta Cliente</a>
            </div>
            <div class="sidebar__link">
                <i class="fa fa-car" aria-hidden="true"></i>
                <a href="Consulta-Carros.php">Consulta Carro</a>
            </div>
            <div class="sidebar__link">
                <i class="fa fa-money" aria-hidden="true"></i>
                <a href="Consulta-Orcamento.php">Consulta Orçamento</a>
            </div>
            <div class="sidebar__link">
                <i class="fa fa-sitemap" aria-hidden="true"></i>
                <a href="Consulta-OS.php">Consulta Ordem Serviço</a>
            </div>
            <div class="sidebar__link">
                <i class="fa fa-users" aria-hidden="true"></i>
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
    <script src="assets/js/script.js"></script>
  </body>
</html>
