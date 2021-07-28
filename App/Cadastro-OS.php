<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if(isset($_SESSION['login']) AND $_SESSION['login'] == 1){
  require_once 'connection.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
  <link rel="stylesheet" href="assets/css/styles.css" />
  <link rel="stylesheet" href="assets/css/Cadastro.css" />
  <title>Cadastro de Ordem de Serviços</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>

</head>

<body id="body">
  <?php
  include_once 'assets/php/mensagem.php';
  include_once 'connection.php';
  ?>
  <script>
      maskMoney();
  </script>
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

                  <label for="iIDOrcamento">Nº Orçamento</label>
                  <input type="text" readonly id="iIDOrcamento" name="nIDOrcamentoOS" value="<?php echo $_GET['id']; ?>" placeholder="Insira o Nº do orçamento">

                  <label for="iDataPrev">Data da Previsao de Entrega</label>
                  <?php  $dataAtual =  date("Y-m-d"); 
                    $dataPrevisao = date('Y/m/d', strtotime("+14 days",strtotime($dataAtual)));
                  ?>
                  <input class="data" type="text" id="iDataPrev" name="nDataPrevOS" data-date="" data-date-format="DD MMMM YYYY" value="<?php echo $dataPrevisao ; ?>">

                  <label for="iValorTotalOS">Valor Total da Ordem de Serviço</label>

                  <input type="text" id="iValorTotalOS" onkeydown="maskMoney(this)" name="nValorTotalOS" placeholder="Insira o valor total da ordem de serviço" 
                  value="<?php 

                    function insercaoDados($sql)
                    {
                      global $connect;
                      $resultado = mysqli_query($connect, $sql);
                      while ($dados = mysqli_fetch_array($resultado)) :
                        $valorServicos =  $dados['valor_total_servicos'];
                        $valorProdutos =  $dados['valor_total_produtos'];
                      endwhile;
                      $valorTotalOrcamento = ($valorServicos + $valorProdutos) * 100;
                    
                      echo $valorTotalOrcamento;
                    }
                    $sql = "SELECT valor_total_servicos, valor_total_produtos FROM orcamentos  WHERE id = " . $_GET['id'] ;

                    insercaoDados($sql);

                    ?>">

                  <label for="iInfoAdicionais">Informações Adicionais</label>
                  <textarea name="nInfoAdicionais" id="iInfoAdicionais" placeholder="Insira as informações adicionais" cols="90" rows="5" maxlength="200" onkeydown="countChar(this, 'counterInfo')"></textarea>
                  <small id="counterInfo" class="caracteresRestantes"></small>

                  <label for="iKM">Quilometragem</label>
                  <input type="text" id="iKM" name="nKMOS" placeholder="Insira a quilometragem">

                  <label for="iMatriFun">Matrícula do Funcionário</label><br>
                  <select class="select" id="iMatriFun" name="nMatriFunOS" placeholder="Insira a matrícula do funcionário">
                      <?php $sql = "SELECT matricula as id, nome as nome FROM funcionarios";

                      $resultado = mysqli_query($connect, $sql);
                      var_dump($resultado);
                      while ($dados = mysqli_fetch_array($resultado)) {
                          echo "<option value=" . $dados['id'] . ">" . $dados['nome'] . ' - ' . $dados['id'] . "</option>";
                      }
                      ?>
                  </select>

                </div>

              </div>

              <div class="btn-group">
                <button type="submit" name="nCadastrarOS" value="Cadastrar" id="Cadastrar" class="btn">Cadastrar</button>

                <button type="reset" name="nLimparOS" value="Limpar" id="Limpar" class="btn">Limpar</button>
              </div>

          </div>
          </form>
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