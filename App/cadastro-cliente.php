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
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <title>Cadastro de Cliente</title>
  </head>
  <body id="body">
  <?php

  include_once 'assets/php/mensagem.php';
  if(isset($_SESSION['setSessionCliente']) and $_SESSION['setSessionCliente'] = true){

  }else{
      $_SESSION['nomeCliente'] = null;
      $_SESSION['telefoneCliente'] = null;
      $_SESSION['dataNascimentoCliente'] = null;
      $_SESSION['cpfCnpjCliente'] = null;
      $_SESSION['emailCliente'] = null;
      $_SESSION['municipioLogradouroCliente'] = null;
      $_SESSION['numeroLogradouroCliente'] = null;
      $_SESSION['estadoLogradouroCliente'] = null;
      $_SESSION['logradouroCliente'] = null;
      $_SESSION['cepLogradouroCliente'] = null;
      $_SESSION['dataCadastroCliente'] = null;
      $_SESSION['bairroLogradouroCliente'] = null;
      $_SESSION['idCliente'] = null;
      $_SESSION['tipoCadastroCliente'] = null;
      $_SESSION['complementoLogradouroCliente'] = null;
  }
  ?>
    <div class="container">
      <nav class="navbar">
      <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <h2>Cadastro Cliente</h2>
        </div>
      </nav>

       <main>
        <div class="main__container">
          <!-- MAIN CARDS STARTS HERE -->
          <div class="main__cards">
          <div class="form">
          <form id="form-cadastro-cliente" action="cadastro.php" method="post">
        <div class="inputs-form">
          <div class="column">
            <label for="iNome">Nome</label>
            <input type="text" id="iNome" name="nNomeCliente" placeholder="Insira o nome do cliente" value="<?php echo $_SESSION['nomeCliente']?>">

            <label for="iTelefone">Telefone</label>
            <input type="text" id="iTelefone" name="nTelefoneCliente" placeholder="Insira o telefone" value="<?php echo $_SESSION['telefoneCliente']?>">
            <script type="text/javascript">

              $("#iTelefone").mask("" +
                  "(00) 0-0000-0000");

            </script>

            <label for="iDataNasc">Data Nascimento</label>
            <input class="data" type="date" id="iDataNasc" name="nDataNascCliente" data-date=""
              data-date-format="DD MMMM YYYY" value="2000-01-01" value="<?php echo $_SESSION['dataNascimentoCliente']?>">

            <label for="iEstado">Estado</label>
            <input type="text" id="iEstado" name="nEstadoCliente" placeholder="Insira o estado" value="<?php echo $_SESSION['estadoLogradouroCliente']?>">

            <label for="iBairro">Bairro</label>
            <input type="text" id="iBairro" name="nBairroCliente" placeholder="Insira o bairro" value="<?php echo $_SESSION['bairroLogradouroCliente']?>">

            <label for="iNumero">Numero</label>
            <input type="text" id="iNumero" name="nNumeroCliente" placeholder="Insira o numero" value="<?php echo $_SESSION['numeroLogradouroCliente']?>"> 

            <BR>
            <BR>

           
                <label for="nPessoaFJ">Classificação do Cliente</label>
                <div id="classificacaoCliente">
                    <!-- Wrapper para trabalhar com input e label dentro de uma div  -->
                    <div class="wrapper">
                        <input type="radio" id="iFisica" name="nPessoaFJ" value="cpf" form="form-cadastro-cliente" checked>
                        <label for="iFisica">Física</label>
                        <input type="radio" id="iJuridica" name="nPessoaFJ" value="cnpj" form="form-cadastro-cliente">
                        <label for="iJuridica">Jurídica</label>
                    </div>
                </div> 
           

          </div>

          <div class="column">

          <div id="divCPF">
               <label for="iCPF">CPF</label>
               <input type="text" id="iCPF" name="nCpfCliente" placeholder="Insira o CPF" value="<?php echo $_SESSION['cpfCnpjCliente']?>">
               <script type="text/javascript">
                    $("#iCPF").mask("000.000.000-00");
               </script>
           </div>

            <div id="divCNPJ">
                <label for="iCNPJ">CNPJ</label>
          	    <input type="text" id="iCNPJ" name="nCnpjCliente" placeholder="Insira o CNPJ" value="<?php echo $_SESSION['cpfCnpjCliente']?>">
              <script type="text/javascript">
                     $("#iCNPJ").mask("00.000.000/0000-00");
              </script>
            </div>

            <label for="iEmail">Email</label>
            <input type="text" id="iEmail" name="nEmailCliente" placeholder="Insira o email" value="<?php echo $_SESSION['emailCliente']?>">

            <label for="iCEP">CEP</label>
            <input type="text" id="iCEP" name="nCEPCliente" placeholder="Insira o CEP" value="<?php echo $_SESSION['cepLogradouroCliente']?>">
            <script type="text/javascript">
                $("#iCEP").mask("00000-000");
            </script>

            <label for="iMunicípio">Município</label>
            <input type="text" id="iMunicípio" name="nMunicipioCliente" placeholder="Insira o município" value="<?php echo $_SESSION['municipioLogradouroCliente']?>">

            <label for="iRua">Logradouro</label>
            <input type="text" id="iRua" name="nRuaCliente" placeholder="Insira a rua" value="<?php echo $_SESSION['logradouroCliente']?>">
            
            <label for="iComplemento">Complemento</label>
            <input type="text" id="iComplemento" name="nComplementoCliente"
              placeholder="Insira o complemento (casa/apartamento)" value="<?php echo $_SESSION['complementoLogradouroCliente']?>">
            
            </div>
        </div>

              <input type="hidden" name="nTipoAcao" value="1">
            <?php $_SESSION['setSessionCliente'] = true; ?>
        <BR>
        <BR>

        <div class="btn-group">
          <button type="submit" name="nCadastrarCliente" value="Cadastrar" class="btn">Cadastrar</button>

          <button type="reset" name="nLimparCliente" value="Limpar" class="btn">Limpar</button>
        </div>

        <br>
        <br>

      </form>
    </div>
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

<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="assets\js\verificaJuridicaFisica.js"></script>
    <script src="assets/js/script.js"></script>
  </body>
</html>