<?php


if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (isset($_SESSION['login']) and $_SESSION['login'] == 1){

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

                <label for="iIDOs">Nº Ordem de Serviço</label><br>
                <input type="text" name="nIDOs" id="iIDOs" value="<?php echo $dados['so_id']?>">

            </div>

            <div class="input-field col s12">
                <label for="iIDOrcamento">Nº Orçamento</label><br>
                <input type="text" readonly name="nIDOrcamento" id="iIDOrcamento" value="<?php echo $dados['orcamento_id']?>">
            </div>

            <div class="input-field col s12">
                <label for="iCliente">Código Cliente</label><br>
                <input type="text" readonly name="nCliente" id="iCliente" value="<?php echo $dados['clientes_id']?>">
            </div>

            <div class="input-field col s12">
                <label for="iCarro">Código Carro</label><br>
                <input type="text" readonly name="nCarro" id="iCarro" value="<?php echo $dados['carros_id']?>">
            </div>

            <div class="input-field col s12">

                <label for="iDescServ">Descrição do Serviço</label><br>
                <input type="text" name="nDescServ" id="iDescServ" value="<?php echo $dados['descricao_servicos']?>">
            </div>

            <div class="input-field col s12">
                <label for="iPrecoObra">Preço Mão de Obra</label><br>
                <input type="text" name="nPrecoObra" id="iPrecoObra" value="<?php echo $dados['valor_total_servicos']?>">
            </div>

            <div class="input-field col s12">
                <label for="iDescPro">Descrição dos Produtos</label><br>
                <input type="text" name="nDescPro" id="iDescPro" value="<?php echo $dados['descricao_produtos']?>">
            </div>

            <div class="input-field col s12">
                <label for="iPrecoPro">Preço dos Produtos</label><br>
                <input type="text" name="nPrecoPro" id="iPrecoPro" value="<?php echo $dados['valor_total_produtos']?>">
            </div>

            <div class="input-field col s12">
                <label for="iDataOrc">Data do Cadastro Orçamento</label><br>
                <input type="text" readonly name="nDataCad" id="iDataOrc" value="<?php echo $dados['data_cadastro']?>">
            </div>

            <div class="input-field col s12">
                <label for="iDataPrev">Data Previsão</label><br>
                <input type="text" name="nDataPrev" id="iDataPrev" value="<?php echo $dados['data_previsao']?>">
            </div>

            <div class="input-field col s12">
                <label for="iDataEnt">Data Entrega</label><br>
                <input type="text" name="nDataEnt" id="iDataEnt" value="<?php echo $dados['data_entrega']?>">
            </div>

            <div class="input-field col s12">
                <label for="iVT">Valor Total</label><br>
                <input type="text" name="nValor" id="iVT" value="<?php echo $dados['valor_final']?>">
            </div>

            <div class="input-field col s12">
            <label for="iInfoAdicionais">Informações Adicionais</label><br><br>
                  <textarea name="nInfoAdicionais" id="iInfoAdicionais" placeholder="Insira as informações adicionais" cols="90" rows="5" maxlength="200" onkeydown="countChar(this, 'counterInfo')"></textarea>
                  <small id="counterInfo" class="caracteresRestantes"></small>
            </div>

            <div class="input-field col s12">
                <label for="iKM">Quilometragem</label><br>
                <input type="text" name="nKM" id="iKM" value="<?php echo $dados['km_atual']?>">
            </div>
            <div class="input-field col s12">
                <label for="iMatFun">Matrícula Funcionário</label><br>
                <input type="text" name="nMatriFun" id="iMatFun" value="<?php echo $dados['matricula_funcionarios']?>">

            </div>

            <div class="input-field col s12">
                
                <label class="status-label">Status</label>
                <div class="radio-buttons">
                    <div>
                        <input type="radio" id="iAprovado" name="nStatus" value="1">
                        <label for="iAprovado" class="custom-label">Aprovado</label>
                    </div>

                    <div>
                        <input type="radio" id="iNaoAprovado" name="nStatus" value="2">
                        <label for="iNaoAprovado" class="custom-label">Não Aprovado</label>
                    </div>

                    <div>
                        <input type="radio" id="iAguardandoAprovacao" name="nStatus" value="3">
                        <label for="iAguardandoAprovacao" class="custom-label">Aguardando Aprovação</label>
                    </div>
                </div>

            </div>
            <div class="input-field col s12">
                <label for="iTipoManu">Tipo Manutenção</label><br>
                <input type="text" name="nTipoManu" id="iTipoManu" value="<?php /* echo $dados['tipomanutencao']*/?>">
            </div>

            <div class="center-align">
                <button type="submit" name="btn-editar-os" class="btn black">Atualizar</button>
                <a href="../Consulta-OS.php" class="btn black">Lista de ordens de serviço</a>
            </div>
        </form>
    </div>
</div>

<?php
include_once 'includes/footer.php';
} else {
    header('location: ../../index.php');
    $_SESSION['tipoErro'] = 'Por favor faça login!';
    $_SESSION['mensagem'] = 'erro';
}


