<?php


if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (isset($_SESSION['login']) and $_SESSION['login'] == 1){

include_once '../connection.php';
include_once 'includes/header.php';


if(isset($_GET['id'])){
    $id = limpaVariavel($_GET['id']);

    $sql = "SELECT * FROM orcamentos WHERE id = '$id'";
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

                <label for="iIDOrcamento">Nº Orçamento</label><br>
                <input type="text" name="nIDOrcamento" id="iIDOrcamento" value="<?php echo $dados['id']?>" readonly>

            </div>
                    
            <div class="input-field col s12">
                <label for="iIDCliente">Código Cliente</label><br>
                <input type="text" name="nIDCliente" id="iIDCliente" value="<?php echo $dados['clientes_id']?>" readonly>
            </div>

            <div class="input-field col s12">
                <label for="iIDCarro">Código Carro</label><br>
                <input type="text" name="nIDCarro" id="iIDCarro" value="<?php echo $dados['carros_id']?>" readonly>
            </div>

            <div class="input-field col s12">
                <label for="iDescServ">Descrição do Serviço</label><br>
                <input type="text" name="nDescServ" id="iDescServ" value="<?php echo $dados['descricao_servicos']?>">
            </div>

            <div class="input-field col s12">
                <label for="iPrecoObra">Preço Mão de Obra</label><br>
                <input type="text" name="nPrecoObra" id="iPrecoObra" value="<?php echo $dados['valor_total_produtos']?>">
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
                <label for="iDataOrc">Data do Orçamento</label><br>
                <input type="text" reandoly name="nDataOrc" id="iDataOrc" value="<?php echo $dados['data']?>">
            </div>

            <div class="input-field col s12">
                
                <label class="status-label">Status</label>
                <div class="radio-buttons">
                    <div>
                        <input type="radio" id="iAprovado" name="nStatus" value="1"<?php if ($dados['status'] == 1) {echo "checked";} ?>>
                        <label for="iAprovado" class="custom-label">Aprovado</label>
                    </div>

                    <div>
                        <input type="radio" id="iNaoAprovado" name="nStatus" value="2"<?php if ($dados['status'] == 2) {echo "checked";} ?>>
                        <label for="iNaoAprovado" class="custom-label">Não Aprovado</label>
                    </div>

                    <div>
                        <input type="radio" id="iAguardandoAprovacao" name="nStatus" value="3"<?php if ($dados['status'] == 3) {echo "checked";} ?>>
                        <label for="iAguardandoAprovacao" class="custom-label">Aguardando Aprovação</label>
                    </div>
                </div>

            </div>

            <input type="hidden" name="nTipoAcao" value="2">

            <div class="center-align">
                <button type="submit" name="btn-editar-orcamento" class="btn black">Atualizar</button>
                <a href="../Consulta-Orcamento.php" class="btn black">Lista de orçamentos</a>
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


