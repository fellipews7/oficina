<?php
include_once '../connection.php';
include_once 'includes/header.php';


if(isset($_GET['id'])){
    $id = limpaVariavel($_GET['id']);

    $sql = "SELECT so.id AS so_id, orc.id AS orcamento_id, orc.clientes_id AS clientes_id, orc.carros_id AS carros_id,
            orc.descricao_servicos AS descricao_servicos, orc.valor_total_servicos AS valor_total_servicos,
            orc.descricao_produtos ,orc.valor_total_produtos AS valor_total_produtos, so.data_cadastro AS data_cadastro,
            so.data_previsao AS data_previsao, so.data_conclusao AS data_entrega, so.valor_final AS valor_final,
            so.km_atual AS km_atual, so.funcionarios_matricula AS matricula_funcionarios, so.status AS status
            FROM ordens_de_servicos AS so 
            INNER JOIN orcamentos AS orc ON orc.id = so.orcamentos_id
            WHERE so.id = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
}
?>

<div class="row">
    <div class="col s12 m6 push-m3 ">
        <h3 class="light">Editar Ordem de Serviço</h3>

        <form action="phpaction/atualizar.php" method="post">

            <input type="hidden" name="nId" value="<?php echo $dados['so_id']?>">

            <div class="input-field col s12">

                <label for="iIDOs">Nº Ordem de Serviço</label>
                <input type="text" name="nIDOs" id="iIDOs" value="<?php echo $dados['so_id']?>">

            </div>

            <div class="input-field col s12">
                <label for="iIDOrcamento">Nº Orçamento</label>
                <input type="text" name="nIDOrcamento" id="iIDOrcamento" value="<?php echo $dados['orcamento_id']?>" reandoly>
            </div>

            <div class="input-field col s12">
                <label for="iCliente"> Cliente</label>
                <input type="text" name="nCliente" id="iCliente" value="<?php echo $dados['clientes_id']?>" reandoly>
            </div>

            <div class="input-field col s12">
                <label for="iCarro">Carro</label>
                <input type="text" name="nCarro" id="iCarro" value="<?php echo $dados['carros_id']?>" reandoly>
            </div>

            <div class="input-field col s12">

                <label for="iDescServ">Descrição do Serviço</label><br>
                <label for="iDescServ">Descrição do Serviço</label>
                <input type="text" name="nDescServ" id="iDescServ" value="<?php echo $dados['descricao_servicos']?>">
            </div>

            <div class="input-field col s12">
                <label for="iPrecoObra">Preço Mão de Obra</label>
                <input type="text" name="nPrecoObra" id="iPrecoObra" value="<?php echo $dados['valor_total_servicos']?>">
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
                <label for="iDataOrc">Data do Cadastro Orçamento</label>
                <input type="text" name="nDataCad" id="iDataOrc" value="<?php echo $dados['data_cadastro']?>">
            </div>

            <div class="input-field col s12">
                <label for="iDataPrev">Data Previsão</label>
                <input type="text" name="nDataPrev" id="iDataPrev" value="<?php echo $dados['data_previsao']?>">
            </div>

            <div class="input-field col s12">
                <label for="iDataEnt">Data Entrega</label>
                <input type="text" name="nDataEnt" id="iDataEnt" value="<?php echo $dados['data_entrega']?>">
            </div>

            <div class="input-field col s12">
                <label for="iVT">Valor Total</label>
                <input type="text" name="nValor" id="iVT" value="<?php echo $dados['valor_final']?>">
            </div>
            <div class="input-field col s12">
                <label for="iKM">Quilometragem</label>
                <input type="text" name="nKM" id="iKM" value="<?php echo $dados['km_atual']?>">
            </div
            div class="input-field col s12">
                <label for="iMatFun">Matrícula Funcionário</label>
                <input type="text" name="nMatriFun" id="iMatFun" value="<?php echo $dados['matricula_funcionarios']?>">

            </div>

            <div class="input-field col s12">
                <label for="iStatus">Status</label>
                <input type="text" name="nStatus" id="iStatus" value="<?php echo $dados['status']?>">
            </div>

            <div class="input-field col s12">
                <label for="iTipoManu">Tipo Manutenção</label>
                <input type="text" name="nTipoManu" id="iTipoManu" value="<?php /* echo $dados['tipomanutencao']*/?>">
            </div>

            <button type="submit" name="btn-editar-os" class="btn black">Atualizar</button>
            <a href="index.php" class="btn black">Lista de clientes</a>
        </form>
    </div>
</div>

<?php
include_once 'includes/footer.php';
?>


