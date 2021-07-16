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
    <title>Cadastro Cargos</title>
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
          <h2>Cadastro Cargo</h2>
        </div>
      </nav>

       <main>
        <div class="main__container">
          <!-- MAIN CARDS STARTS HERE -->
          <div class="main__cards">
          <div class="form">
          <form method="post" action="cadastro.php">
        <div class="inputs-form">

          <div class="column">

            <label for="iNome">Nome</label>
            <input type="text" id="iNome" name="nNomeCargo" placeholder="Insira o nome do cargo">

          </div>
          <div class="column">

            <label for="iDescrição">Descrição</label>
            <input type="text" id="iDescricao" name="nDescricaoCargo" placeholder="Insira a descrição">

          </div>

        </div>

        <div class="btn-group">

          <button type="submit" name="nEnviarCargo" value="Enviar" class="btn">Enviar</button>

          <button type="reset" name="nLimparCargo" value="Limpar" class="btn">Limpar</button>

        </div>

        <br>
        <br>

      </form>
    </div>
  </div>
        </div>
     </main>

    <?php include_once 'assets/php/menu.php';?>    

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="assets/js/script.js"></script>
  </body>
</html>
