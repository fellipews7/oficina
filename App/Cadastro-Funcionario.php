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

                  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

                  <label for="iCPF">CPF</label>
                  <input type="text" id="iCPF" name="nCPFFuncionario" class="form-control" onkeypress="$(this).mask('000.000.000-00');" placeholder="Insira o CPF " value="<?php echo $_SESSION['cpfFunc'] ?>">

                  <label for="iTelefone">Telefone</label>
                  <input type="text" id="iTelefone" name="nTelefoneFuncionario" class="form-control" onkeypress="$(this).mask('(00) 0000-00009')" placeholder="Insira o telefone" value="<?php echo $_SESSION['telefoneFunc'] ?>">

                  <label for="iIDCargo">Selecione o Código do Cargo</label><br>
                  <select class="select" id="iIDCargo" name="nIDCargoFuncionarios" placeholder="Insira o ID do cargo do funcionario" value="<?php echo $_SESSION['cargoFunc'] ?>">
                  </select><br>

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
<?php
}else{
    header('location: ../index.php');
    $_SESSION['tipoErro'] = 'Por favor faça login!';
    $_SESSION['mensagem'] = 'erro';
}
