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
      <link rel="stylesheet" href="assets/css/styles.css" />
      <link rel="stylesheet" href="assets/css/Cadastro.css"/>
    <title>Cadastro de Ordem de Serviços</title>
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
        <div class="navbar__left" id="cadastroOSTitulo">
          <h2>Cadastro Ordem de Serviço</h2>
        </div>
      </nav>

       <main>
        <div class="main__container">
          <!-- MAIN CARDS STARTS HERE -->
          <div class="main__cards">
          <div class="form">
          <form action="cadastro.php" method="post">
        <div class="inputs-form">
          <div class="column">
            
            <label for="iIDOrcamento">ID Orçamento</label>
            <input type="text" id="iIDOrcamento" name="nIDOrcamentoOS" placeholder="Insira o ID do orçamento">
            
            <label for="iDataPrev">Data da Previsao de Entrega</label>
            <input class="data" type="date" id="iDataPrev" name="nDataPrevOS" data-date=""
            data-date-format="DD MMMM YYYY" value="2000-01-01">

            <label for="iValorTotalOS">Valor Total da Ordem de Serviço</label>
            <input type="text" id="iValorTotalOS" name="nValorTotalOS" placeholder="Insira o valor total da ordem de serviço">
           
            <label for="iKM">Quilometragem</label>
            <input type="text" id="iKM" name="nKMOS" placeholder="Insira a quilometragem">

            <label for="iMatriFun">Matrícula do Funcionário</label>
            <input type="text" id="iMatriFun" name="nMatriFunOS" placeholder="Insira a matrícula do funcionário">

           </div>
                  
            </div>

            <div class="imprimirOS">
              <a href="ImprimirOS.php" target="_blank" id="ImprimirOS"><i class="fa fa-print fa-2x"></i></a>
            </div>

              <script>

                  document.getElementById("Cadastrar").onclick = function (){
                      <?php setSessaoOs(); ?>

                  }

                  document.getElementById("Limpar").onclick = function (){
                      <?php unsetSessaoOs(); ?>

                  }

              </script>
            <div class="btn-group">
              <button type="submit" name="nCadastrarOS" value="Cadastrar" id="Cadastrar" class="btn">Cadastrar</button>
    
              <button type="reset" name="nLimparOS" value="Limpar" id="Limpar" class="btn">Limpar</button>
            </div>
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