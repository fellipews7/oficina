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
    <title>CSS GRID DASHBOARD</title>
  </head>
  <body id="body">
    <div class="container">
      <nav class="navbar">
      <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <h2>Consulta Funcionário</h2>
        </div>
      </nav>

       <main>
        <div class="main__container">
          <!-- MAIN CARDS STARTS HERE -->
          <div class="main__cards">
          <div class="form">
          <form>
        <!--Inicia a coluna-->
        <label for="iPalavraChave">Palavra Chave</label>
        <input type="text" id="iPalavraChave" name="nPalavraChaveFuncionarioCon"
        placeholder="Insira a palavra chave para pesquisa">
        <div class="columns">

          <div class="column 1">
            <label for="nTipoPalavraChave" id="LabelsRadios">Tipo da Palavra Chave</label>

            <div class="wrapper">
              <input type="radio" id="Nome" name="nTipoPalavraChave" value="Nome">
              <label for="Nome">Nome</label>
              <input type="radio" id="CPF" name="nTipoPalavraChave" value="CPF">
              <label for="CPF">CPF</label>
              <input type="radio" id="iCargo" name="nTipoPalavraChave" value="Cargo">
              <label for="iCargo">Cargo</label>
            </div>
          </div>


        </div>
        
        <br>
        <br>

        <div class="btn-group">
          <button name="nPesquisarFuncionarioCon" value="Enviar" class="btn">Pesquisar</button>

          <button type="reset" name="nLimparFuncionarioCon" value="Limpar" class="btn">Limpar</button>
        </div>

        <br>
        <br>

        <table rules=all>
          <tr>
            <th>Matricula</th>
            <th>Cargo</th> 
            <th>Nome</th>
            <th>Telefone</th>
            <th><i class="fa fa-search-plus" aria-hidden="true"></i></th>
          </tr>
            <?php
            if(isset($_GET['nPesquisarClienteCon'])) {
                $tipoPalavraChave = limpezaVariavel($_GET['nTipoPalavraChave']);
                $palavraChave = limpezaVariavel($_GET['nPalavraChaveClienteCon']);

                $sql = "SELECT id, nome, logradouro, numero_logradouro, telefone, cpf, cnpj FROM clientes 
                                WHERE " . $tipoPalavraChave . " LIKE '$palavraChave%'";
                insercaoDados($sql);
            }

            function insercaoDados($sql)
            {
                global $connect;
                $resultado = mysqli_query($connect, $sql);
                while ($dados = mysqli_fetch_array($resultado)):
                    echo '<td>'. $dados['id'] .'</td>';
                    echo '<td>'. $dados['nome'] .'</td>';
                    echo '<td>'. $dados['logradouro']. ', ' .$dados['numero_logradouro'] .'</td>';
                    echo '<td>'. $dados['telefone'] .'</td>';
                    echo '<td>'. $dados['cnpj'] .'</td>';


                    echo '<td id="iCantoBotao">';
                    echo '<a href="VerMaisCliente.php?id= '.$dados["id"].'" id="VerMaisCliente" name="nVerMaisCliente"><i class="fa fa-search-plus" aria-hidden="true"></i></a>';
                    echo '</td>';

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
