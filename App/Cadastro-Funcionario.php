<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
  <link rel="stylesheet" href="assets/css/styles.css" />
  <link rel="stylesheet" href="assets/css/Cadastro.css" />
  <title>Cadastro de Funcionario</title>
</head>

<body id="body">
  <?php
  include_once 'assets/php/mensagem.php';
  include_once 'assets/php/sessoes.php';

  if (isset($_SESSION['setSessionFunc']) and $_SESSION['setSessionFunc'] = true) {
  } else {
    unsetSessaoFunc();
  }
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
            <form action="cadastro.php" method="post">
              <div class="inputs-form">
                <div class="column">
                  <label for="iNome">Nome</label>
                  <input type="text" id="iNome" name="nNomeFuncionario" placeholder="Insira o nome do funcionário" value="<?php echo $_SESSION['nomeFunc'] ?>">

                  <label for="iCPF">CPF</label>
                  <input type="text" id="iCPF" name="nCPFFuncionario" placeholder="Insira o CPF " value="<?php echo $_SESSION['cpfFunc'] ?>">

                  <label for="iTelefone">Telefone</label>
                  <input type="text" id="iTelefone" name="nTelefoneFuncionario" placeholder="Insira o telefone" value="<?php echo $_SESSION['telefoneFunc'] ?>">

                  <label for="iIDCargo">ID do Cargo</label>
                  <input type="text" id="iIDCargo" name="nIDCargoFuncionarios" placeholder="Insira o ID do cargo do funcionario" value="<?php echo $_SESSION['cargoFunc'] ?>">

                  <label for="iUsuario">Usuário</label>
                  <input type="text" id="iUsuario" name="nUsuario" placaholder="Insira o nome do seu usuário" value>

                  <label for="iSenha">Senha</label>
                  <input type="password" id="iSenha" name="nSenha" placaholder="Insira a senha do usuário" value>

                </div>
              </div>

              <input type="hidden" name="nTipoAcao" value="1">

              <script>
                document.getElementById("Cadastrar").onclick = function() {
                  <?php setSessaoFunc(); ?>

                }

                document.getElementById("Limpar").onclick = function() {
                  <?php unsetSessaoFunc(); ?>

                }
              </script>


              <div class="btn-group">
                <button type="submit" name="nCadastrarFuncionarios" value="Cadastrar" id="Cadastrar" class="btn">Cadastrar</button>

                <button type="reset" name="nLimparFuncionarios" value="Limpar" id="Limpar" class="btn">Limpar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </main>

    <?php include_once 'assets/php/menu.php'; ?>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script src="assets/js/script.js"></script>
</body>

</html>