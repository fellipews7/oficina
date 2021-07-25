<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (isset($_SESSION['login']) and $_SESSION['login'] == 1) {

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
  <link rel="stylesheet" href="assets/css/styles.css" />
  <link rel="stylesheet" href="assets/css/Cadastro.css" />
  <title>Cadastro de Carros</title>
</head>

<body id="body">
  <?php
  include_once 'assets/php/mensagem.php';
  include_once 'assets/php/sessoes.php';

  if (isset($_SESSION['setSessionCarros']) and $_SESSION['setSessionCarros'] = true) {
  } else {
    unsetSessaoCarros();
  }

  ?>
  <div class="container">
    <nav class="navbar">
      <div class="nav_icon" onclick="toggleSidebar()">
        <i class="fa fa-bars" aria-hidden="true"></i>
      </div>
      <div class="navbar__left">
        <h2>Cadastro Carro</h2>
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

                  <label for="Marca">Marca</label>
                  <input type="text" id="Marca" name="nMarcaCarro" placeholder="Insira a marca do carro" value="<?php echo $_SESSION['marcaCarros'] ?>">

                  <label for="Modelo">Modelo</label>
                  <input type="text" id="Modelo" name="nModeloCarro" placeholder="Insira o modelo do carro" value="<?php echo $_SESSION['modeloCarros'] ?>">

                  <label for="Placa">Placa</label>
                  <input type="text" id="Placa" name="nPlacaCarro" placeholder="Insira a placa do carro" value="<?php echo $_SESSION['placaCarros'] ?>">

                </div>
                <div class="column">


                  <label for="AnodoModelo">Ano do Modelo</label>
                  <input type="text" maxlength="4" id="AnodoModelo" name="nAnodoModeloCarro" placeholder="Insira o ano do modelo" value="<?php echo $_SESSION['anoModeloCarros'] ?>">

                  <label for="AnoFabricação">Ano Fabricação</label>
                  <input type="text" maxlength="4" id="AnoFabricação" name="nAnoFabricacaoCarro" placeholder="Insira o ano de fabricação" value="<?php echo $_SESSION['anoFabricacaoCarros'] ?>">

                  <label for="Renavam">Renavam</label>
                  <input type="text" id="Renavam" name="nRenavamCarro" placeholder="Insira o renavam do carro" value="<?php echo $_SESSION['renavamCarros'] ?>">

                </div>
                
              </div>

              <input type="hidden" name="nTipoAcao" value="1">

              <script>
                document.getElementById("Cadastrar").onclick = function() {
                  <?php setSessaoCarros(); ?>

                }

                document.getElementById("Limpar").onclick = function() {
                  <?php unsetSessaoCarros(); ?>

                }
              </script>
              <div class="btn-group-carro">
                <button type="submit" name="nCadastrarCarros" value="Cadastrar" id="Cadastrar" class="btn">Cadastrar</button>
                <button type="reset" name="nLimparCarros" value="Limpar" id="Limpar" class="btn">Limpar</button>
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
