<?php
include_once 'phpaction/db_connect.php';
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
        <h3 class="light">Editar Ordem de Serviço</h3>

        <form action="phpaction/atualizar.php" method="post">

            <input type="hidden" name="nId" value="<?php echo $dados['id']?>">

            <div class="input-field col s12">
                <label for="iIDOrcamento">Nº Ordem de Serviço</label>
                <input type="text" name="nIDOrcamento" id="iIDOrcamento" value="<?php echo $dados['nome']?>">
            </div>

            <div class="input-field col s12">
                <label for="iIDOrcamento">Nº Orçamento</label>
                <input type="text" name="nIDOrcamento" id="iIDOrcamento" value="<?php echo $dados['nome']?>">
            </div>

            <div class="input-field col s12">
                <label for="iCliente"> Cliente</label>
                <input type="text" name="nCliente" id="iCliente" value="<?php echo $dados['nome']?>">
            </div>

            <div class="input-field col s12">
                <label for="iCarro">Carro</label>
                <input type="text" name="nCarro" id="iCarro" value="<?php echo $dados['nome']?>">
            </div>

            <div class="input-field col s12">
                <label for="iDescServ">Descrição do Serviço</label>
                <input type="text" name="nDescServ" id="iDescServ" value="<?php echo $dados['nome']?>">
            </div>

            <div class="input-field col s12">
                <label for="iPrecoObra">Preço Mão de Obra</label>
                <input type="text" name="nPrecoObra" id="iPrecoObra" value="<?php echo $dados['nome']?>">
            </div>

            <div class="input-field col s12">
                <label for="iDescPro">Descrição dos Produtos</label>
                <input type="text" name="nDescPro" id="iDescPro" value="<?php echo $dados['nome']?>">
            </div>

            <div class="input-field col s12">
                <label for="iPrecoPro">Preço dos Produtos</label>
                <input type="text" name="nPrecoPro" id="iPrecoPro" value="<?php echo $dados['nome']?>">
            </div>

            <div class="input-field col s12">
                <label for="iDataOrc">Data do Cadastro Orçamento</label>
                <input type="text" name="nDataOrc" id="iDataOrc" value="<?php echo $dados['nome']?>">
            </div>

            <div class="input-field col s12">
                <label for="iDataPrev">Data Previsão</label>
                <input type="text" name="nDataPrev" id="iDataPrev" value="<?php echo $dados['nome']?>">
            </div>

            <div class="input-field col s12">
                <label for="iDataEnt">Data Entrega</label>
                <input type="text" name="nDataEnt" id="iDataEnt" value="<?php echo $dados['nome']?>">
            </div>

            <div class="input-field col s12">
                <label for="iVT">Valor Total</label>
                <input type="text" name="nVT" id="iVT" value="<?php echo $dados['nome']?>">
            </div>
            <div class="input-field col s12">
                <label for="iKM">Quilometragem</label>
                <input type="text" name="iKM" id="iKM" value="<?php echo $dados['nome']?>">
            </div>
            <div class="input-field col s12">
                <label for="iMatFun">Matrícula Funcionário</label>
                <input type="text" name="nMatFun" id="iMatFun" value="<?php echo $dados['nome']?>">
            </div>

            <div class="input-field col s12">
                <label for="iStatus">Status</label>
                <input type="text" name="iStatus" id="iStatus" value="<?php echo $dados['nome']?>">
            </div>

            <div class="input-field col s12">
                <label for="iTipoManu">Tipo Manutenção</label>
                <input type="text" name="nTipoManu" id="iTipoManu" value="<?php echo $dados['nome']?>">
            </div>

            <button type="submit" name="btn-editar" class="btn black">Atualizar</button>
            <a href="index.php" class="btn black">Lista de OS</a>
        </form>
    </div>
</div>

<?php
include_once 'includes/footer.php';
?>


