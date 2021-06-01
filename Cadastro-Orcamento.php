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

            <label for="iIDCLiente">ID do Cliente</label>
            <input type="text" id="iIDCLiente" name="nIDCLienteOrcamento" placeholder="Insira o ID do cliente">

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

            <label for="iIDCarro">ID do Carro</label>
            <input type="text" id="iIDCarro" name="nIDCarroOrcamento" placeholder="Insira o ID do carro">

            <label for="iPrecoMaoObra">Preço Mão de Obra</label>
            <input type="text" id="iPrecoMaoObra" name="nPrecoMaoObraOrcamento" placeholder="Insira o preço da mão de obra">

            <label for="iPreçoTotalPro">Preço Total de Produtos</label>
            <input type="text" id="iPreçoTotalPro" name="nPreçoTotalProOrcamento" placeholder="Insira o preço preço total dos produtos">
                          
          </div>

            </div>
            
            <div class="btn-group">
              <button type="submit" name="nCadastrarOrcamento" value="ECadastrarnviar" class="btn">Cadastrar</button>
    
              <button type="reset" name="nLimparOrcamento" value="Limpar" class="btn">Limpar</button>
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
    <script src="script.js"></script>
  </body>
</html>