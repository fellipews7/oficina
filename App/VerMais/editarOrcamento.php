<?php
include_once '../connection.php';
include_once 'includes/header.php';
include_once 'includes/funcao.php';

if(isset($_GET['id'])){
    $id = clear($_GET['id']);

    $sql = "SELECT * FROM orcamentos WHERE id = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
}
?>

<div class="row">
    <div class="col s12 m6 push-m3 ">
        <h3 class="light">Editar Orçamento</h3>

        <form action="../VerMaisOrcamento/phpaction/atualizar.php" method="post">

            <input type="hidden" name="nId" value="<?php echo $dados['id']?>">

            <div class="input-field col s12">
                <label for="iIDOrcamento">ID Orçamento</label>
                <input type="text" name="nIDOrcamento" id="iIDOrcamento" value="<?php echo $dados['id']?>">
            </div>

            <div class="input-field col s12">
                <label for="iIDCliente">ID Cliente</label>
                <input type="text" name="nIDCliente" id="iIDCliente" value="<?php echo $dados['clientes_id']?>">
            </div>

            <div class="input-field col s12">
                <label for="iIDCarro">ID Carro</label>
                <input type="text" name="nIDCarro" id="iIDCarro" value="<?php echo $dados['carros_id']?>">
            </div>

            <div class="input-field col s12">
                <label for="iDescServ">Descrição do Serviço</label>
                <input type="text" name="nDescServ" id="iDescServ" value="<?php echo $dados['descricao_servicos']?>">
            </div>

            <div class="input-field col s12">
                <label for="iPrecoObra">Preço Mão de Obra</label>
                <input type="text" name="nPrecoObra" id="iPrecoObra" value="<?php echo $dados['valor_total_produtos']?>">
            </div>

            <div class="input-field col s12">
                <label for="iDescPro">Descrição dos Produtos</label>
                <input type="text" name="nDescPro" id="iDescPro" value="<?php echo $dados['descricao_produtos']?>">
            </div>

            <div class="input-field col s12">
                <label for="iPrecoPro">Preço dos Produtos</label>
                <input type="text" name="nPrecoPro" id="iPrecoPro" value="<?php echo $dados['valor_total_produtos']?>">
            </div>

            <div class="input-field col s12">
                <label for="iDataOrc">Data do Orçamento</label>
                <input type="text" name="nDataOrc" id="iDataOrc" value="<?php echo $dados['data']?>">
            </div>

            <div class="input-field col s12">
                <label for="iStatus">Status</label>
                <input type="text" name="iStatus" id="iStatus" value="<?php echo $dados['status']?>">
            </div>


            <button type="submit" name="btn-editar" class="btn black">Atualizar</button>
            <a href="../Consulta-Orcamento.php" class="btn black">Lista de orçamentos</a>
        </form>
    </div>
</div>

<?php
include_once 'includes/footer.php';
?>


