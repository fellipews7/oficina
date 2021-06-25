<?php
include_once '../connection.php';
include_once 'includes/header.php';
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
        <h3 class="light">Editar Cliente</h3>

        <form action="phpaction/atualizar.php" method="post">

            <input type="hidden" name="nId" value="<?php echo $dados['id']?>">

            <div class="input-field col s12">
                <label for="iID">ID</label>
                <input type="text" readonly name="nID" id="iID" value="<?php echo $dados['id']?>">
            </div>

            <div class="input-field col s12">
                <label for="iPlaca">Nome</label>
                <input type="text" name="nNomeCliente" id="iNome" value="<?php echo $dados['nome']?>">
            </div>

            <div class="input-field col s12">
                <label for="iCpfCnpj">CPF/CNPJ</label>
                <input type="text" name="nCPFCNPJCLiente" id="iCpf" value="<?php echo $dados['cpf']?>">
            </div>

            <div class="input-field col s12">
                <label for="iTelefone"></label>
                <input type="text" name="nTelefoneCliente" id="iTelefone" value="<?php echo $dados['telefone']?>">
            </div>

            <div class="input-field col s12">
                <label for="iEmail">Email</label>
                <input type="text" name="nEmailCliente" id="iEmail" value="<?php echo $dados['email']?>">
            </div>

            <div class="input-field col s12">
                <label for="iDataNasc">Data Nascimento</label>
                <input type="text" name="nDataNascCliente" id="iDataNasc" value="<?php echo $dados['data_nascimento']?>">
            </div>

            <div class="input-field col s12">
                <label for="iEstado">Estado</label>
                <input type="text" name="nEstadoCliente" id="iEstado" value="<?php echo $dados['estado']?>">
            </div>

            <div class="input-field col s12">
                <label for="iEstado">Municipio</label>
                <input type="text" name="nMunicipioCliente" id="nMunicipioCliente" value="<?php echo $dados['municipio']?>">
            </div>

            <div class="input-field col s12">
                <label for="iCep">CEP</label>
                <input type="text" name="nCEPCliente" id="iCep" value="<?php echo $dados['cep']?>">
            </div>

            <div class="input-field col s12">
                <label for="iBairro">Bairro</label>
                <input type="text" name="nBairroCliente" id="iBairro" value="<?php echo $dados['bairro']?>">
            </div>

            <div class="input-field col s12">
                <label for="iLogradouro">Logradouro</label>
                <input type="text" name="nRuaCliente" id="iLogradouro" value="<?php echo $dados['logradouro']?>">
            </div>

            <div class="input-field col s12">
                <label for="iNumero">Número</label>
                <input type="text" name="nNumeroCliente" id="iNumero" value="<?php echo $dados['numero_logradouro']?>">
            </div>

            <div class="input-field col s12">
                <label for="iComplemento">Complemento</label>
                <input type="text" name="nComplementoCliente" id="iComplemento" value="<?php echo $dados['complemento_logradouro']?>">
            </div>

            <input type="hidden" name="nTipoAcao" value="2">

            <button type="submit" name="btn-editar-carro" class="btn black">Atualizar</button>
            <a href="../Consulta-Carros.php" class="btn black">Lista de carros</a>
        </form>
    </div>
</div>

<?php
include_once 'includes/footer.php';
?>


