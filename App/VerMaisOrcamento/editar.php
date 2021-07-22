<?php
<<<<<<< HEAD:App/VerMaisOrcamento/editar.php
include_once 'phpaction/db_connect.php';
=======
include_once '../connection.php';
>>>>>>> parent of de34d2c... merge:App/VerMais/editarOrcamento.php
include_once 'includes/header.php';
require_once 'phpaction/db_connect.php';
include_once 'includes/funcao.php';

if(isset($_GET['id'])){
    $id = clear($_GET['id']);

    $sql = "SELECT * FROM clientes WHERE id = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
}
?>

<div class="row">
    <div class="col s12 m6 push-m3 ">
        <h3 class="light">Editar Orçamento</h3>

        <form action="phpaction/atualizar.php" method="post">

            <input type="hidden" name="nId" value="<?php echo $dados['id']?>">

            <div class="input-field col s12">
<<<<<<< HEAD:App/VerMaisOrcamento/editar.php
                <label for="iIDOrcamento">ID Orçamento</label>
                <input type="text" name="nIDOrcamento" id="iIDOrcamento" value="<?php echo $dados['IDorcamento']?>">
            </div>

            <div class="input-field col s12">
                <label for="iIDCliente">ID Cliente</label>
                <input type="text" name="nIDCliente" id="iIDCliente" value="<?php echo $dados['IDcliente']?>">
            </div>

            <div class="input-field col s12">
                <label for="iIDCarro">ID Carro</label>
                <input type="text" name="nIDCarro" id="iIDCarro" value="<?php echo $dados['IDcarro']?>">
=======

                <label for="iIDOrcamento">ID Orçamento</label><br>
                <input type="text" reandoly name="nIDOrcamento" id="iIDOrcamento" value="<?php echo $dados['id']?>">

            </div>

            <div class="input-field col s12">
                <label for="iIDCliente">ID Cliente</label><br>
                <input type="text" name="nIDCliente" id="iIDCliente" value="<?php echo $dados['clientes_id']?>">
            </div>

            <div class="input-field col s12">
                <label for="iIDCarro">ID Carro</label><br>
                <input type="text" name="nIDCarro" id="iIDCarro" value="<?php echo $dados['carros_id']?>">
>>>>>>> parent of de34d2c... merge:App/VerMais/editarOrcamento.php
            </div>

            <div class="input-field col s12">
                <label for="iDescServ">Descrição do Serviço</label>
                <input type="text" name="nDescServ" id="iDescServ" value="<?php echo $dados['descricao_servico']?>">
            </div>

            <div class="input-field col s12">
                <label for="iPrecoObra">Preço Mão de Obra</label>
                <input type="text" name="nPrecoObra" id="iPrecoObra" value="<?php echo $dados['precoobra']?>">
            </div>

            <div class="input-field col s12">
                <label for="iDescPro">Descrição dos Produtos</label>
                <input type="text" name="nDescPro" id="iDescPro" value="<?php echo $dados['descricaoproduto']?>">
            </div>

            <div class="input-field col s12">
                <label for="iPrecoPro">Preço dos Produtos</label>
                <input type="text" name="nPrecoPro" id="iPrecoPro" value="<?php echo $dados['precoproduto']?>">
            </div>

            <div class="input-field col s12">
<<<<<<< HEAD:App/VerMaisOrcamento/editar.php
                <label for="iDataOrc">Data do Orçamento</label>
                <input type="text" name="nDataOrc" id="iDataOrc" value="<?php echo $dados['dataorcamento']?>">
=======
                <label for="iDataOrc">Data do Orçamento</label><br>
                <input type="text" name="nDataOrc" id="iDataOrc" value="<?php echo $dados['data']?>">
>>>>>>> parent of de34d2c... merge:App/VerMais/editarOrcamento.php
            </div>

            <div class="input-field col s12">
                <label for="iStatus">Status</label>
                <input type="text" name="iStatus" id="iStatus" value="<?php echo $dados['status']?>">
            </div>

            <div class="input-field col s12">
                <label for="iTipoManu">Tipo Manutenção</label>
                <input type="text" name="nTipoManu" id="iTipoManu" value="<?php echo $dados['tipomanutencao']?>">
            </div>

            <button type="submit" name="btn-editar" class="btn black">Atualizar</button>
            <a href="index.php" class="btn black">Lista de orçamentos</a>
        </form>
    </div>
</div>

<?php
include_once 'includes/footer.php';
?>


