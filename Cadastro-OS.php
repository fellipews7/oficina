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
    <title>CSS GRID DASHBOARD</title>
  </head>
  <body id="body">
    <div class="container">
      <nav class="navbar">
      <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
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
          <div class="column one">
            
            <label for="iIDOrcamento">ID Orçamento</label>
            <input type="text" id="iIDOrcamento" name="nIDOrcamentoOS" placeholder="Insira o ID do orçamento">

            <label for="iIDCliente">ID do Cliente</label>
            <input type="text" id="iIDCliente" name="nIDClienteOS" placeholder="Insira o ID do cliente">

            <label for="iIDCarro">ID Carro</label>
            <input type="text" id="iIDCarro" name="nIDCarroOS" placeholder="Insira o ID do orçamento">

            <label for="iDesProdutos">Descrição Produtos</label>
            <input type="text" id="iDesProdutos" name="nDesProdutos" placeholder="Insira os produtos usados">
            
            <label for="iValorTotalPro">Valor Total Produtos</label>
            <input type="text" id="iValorTotalPro" name="nValorTotalPro" placeholder="Insira o valor totald os produtos utilizados">

            <label for="iDesServicos">Descrição Serviços</label>
            <input type="text" id="iDesServicos" name="nDesServicos" placeholder="Insira os serviços feitos">
            
            <label for="iValorTotalSer">Valor Total Serviços</label>
            <input type="text" id="iValorTotalSer" name="nValorTotalSer" placeholder="Insira o valor total dos serviços">

          </div>

          <div class="column two">
            
            <label for="iDataPrev">Data da Previsao de Entrega</label>
            <input class="data" type="date" id="iDataPrev" name="nDataPrevOS" data-date=""
            data-date-format="DD MMMM YYYY" value="2000-01-01">

            <label for="iValorTotalOS">Valor Total da Ordem de Serviço</label>
            <input type="text" id="iValorTotalOS" name="nValorTotalOS" placeholder="Insira o valor total da ordem de serviço">
           
            <label for="iKM">Quilometragem</label>
            <input type="text" id="iKM" name="nKMOS" placeholder="Insira a quilometragem">

            <label for="iMatriFun">Matrícula do Funcionário</label>
            <input type="text" id="iMatriFun" name="nMatriFunOS" placeholder="Insira a matrícula do funcionário">

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
                  
            </div>

            <div class="btn-group">
              <button type="submit" name="nCadastrarOS" value="Cadastrar" class="btn">Cadastrar</button>
    
              <button type="reset" name="nLimparOS" value="Limpar" class="btn">Limpar</button>

              <a href="ImprimirOS.php" target="_blank" id="ImprimirOS">Imprimir</a>
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