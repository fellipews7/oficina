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
  <?php
  include_once 'assets/php/mensagem.php';
  ?>
    <div class="container">
      <nav class="navbar">
      <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <h2>Cadastro Funcionario</h2>
        </div>
      </nav>

       <main>
        <div class="main__container">
          <!-- MAIN CARDS STARTS HERE -->
          <div class="main__cards">
          <div class="form">
<<<<<<< HEAD
          <form action="cadastro.php" method="post">
        <div class="inputs-form">
          <div class="column">
            <label for="iNome">Nome</label>
            <input type="text" id="iNome" name="nNomeFuncionario" placeholder="Insira o nome do funcionário">
=======
            <form action="cadastro.php" method="post">
              <div class="inputs-form">
                <div class="column">
                  <label for="iNome">Nome</label>
                  <input type="text" id="iNome" name="nNomeFuncionario" placeholder="Insira o nome do funcionário" value="<?php echo $_SESSION['nomeFunc'] ?>">

                  <label for="iCPF">CPF</label>
                  <input type="text" id="iCPF" name="nCPFFuncionario" placeholder="Insira o CPF " value="<?php echo $_SESSION['cpfFunc'] ?>">

                  <label for="iTelefone">Telefone</label>
                  <input type="text" id="iTelefone" name="nTelefoneFuncionario" placeholder="Insira o telefone" value="<?php echo $_SESSION['telefoneFunc'] ?>">

                  <label for="iIDCargo">Cargo</label>
                  <select id="iIDCargo" class="select" name="nIDCargoFuncionarios">
                    <?php $sql = "SELECT id as id, nome as nome FROM cargos";
                    $resultado = mysqli_query($connect, $sql);
                    while ($dados = mysqli_fetch_array($resultado)) {
                      echo "<option value=" . $dados['id'] . ">" . $dados['nome'] . "</option>";
                    }
                    ?>
                  </select><br> 

                  <label for="iUsuario">Usuário</label>
                  <input type="text" id="iUsuario" name="nUsuario" placaholder="Insira o nome do seu usuário" value>

                  <label for="iSenha">Senha</label>
                  <input type="password" id="iSenha" name="nSenha" placaholder="Insira a senha do usuário" value>
>>>>>>> parent of de34d2c... merge

            <label for="iCPF">CPF</label>
            <input type="text" id="iCPF" name="nCPFFuncionario" placeholder="Insira o CPF ">

            <label for="iTelefone">Telefone</label>
            <input type="text" id="iTelefone" name="nTelefoneFuncionario" placeholder="Insira o telefone">

            <label for="iIDCargo">ID do Cargo</label>
            <input type="text" id="iIDCargo" name="nIDCargoFuncionarios" placeholder="Insira o ID do cargo do funcionario">
          </div>
        </div>

        <div class="btn-group">
          <button type="submit" name="nCadastrarFuncionarios" value="Cadastrar" class="btn">Cadastrar</button>

          <button type="reset" name="nLimparFuncionarios" value="Limpar" class="btn">Limpar</button>
        </div>
      </form>
    </div>
  </div>
        </div>
     </main>

<<<<<<< HEAD
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
=======
</html>
>>>>>>> parent of de34d2c... merge
