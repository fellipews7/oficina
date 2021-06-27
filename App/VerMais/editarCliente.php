<?php
include_once '../connection.php';
include_once 'includes/header.php';
include_once '../assets/php/mensagem.php';


if(isset($_GET['id'])){
    $id = limpaVariavel($_GET['id']);

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
                <label for="iID">Código do Cliente</label><br>
                <input type="text" readonly name="nID" id="iID" value="<?php echo $dados['id']?>">
            </div>

            <div class="input-field col s12">
                <label for="iPlaca">Nome</label><br>
                <input type="text" name="nNomeCliente" id="iNome" value="<?php echo $dados['nome']?>">
            </div>

            <div class="input-field col s12">
                <label for="iCpfCnpj">CPF/CNPJ</label><br>

                <input type="text" name="nCPFCNPJCLiente" id="iCpf" value="<?php echo $dados['cpf'].$dados['cnpj']?>">

            </div>

            <div class="input-field col s12">
                <label for="iTelefone">Número para Contato</label><br>
                <input type="text" name="nTelefoneCliente" id="iTelefone" value="<?php echo $dados['telefone']?>">
            </div>

            <div class="input-field col s12">
                <label for="iEmail">E-mail</label><br>
                <input type="text" name="nEmailCliente" id="iEmail" value="<?php echo $dados['email']?>">
            </div>

            <div class="input-field col s12">
                <label for="iDataNasc">Data Nascimento</label><br>

                <input type="date" name="nDataNascCliente" id="iDataNasc" value="<?php echo $dados['data_nascimento']?>">

            </div>

            <div class="input-field col s12">
                <label for="iEstado">Estado</label><br>
                <input type="text" name="nEstadoCliente" id="iEstado" value="<?php echo $dados['estado']?>">
            </div>

            <div class="input-field col s12">
                <label for="iEstado">Municipio</label><br>
                <input type="text" name="nMunicipioCliente" id="nMunicipioCliente" value="<?php echo $dados['municipio']?>">
            </div>

            <div class="input-field col s12">
                <label for="iCep">CEP</label><br>
                <input type="text" name="nCEPCliente" id="iCep" value="<?php echo $dados['cep']?>">
            </div>

            <div class="input-field col s12">
                <label for="iBairro">Bairro</label><br>
                <input type="text" name="nBairroCliente" id="iBairro" value="<?php echo $dados['bairro']?>">
            </div>

            <div class="input-field col s12">
                <label for="iLogradouro">Logradouro</label><br>
                <input type="text" name="nRuaCliente" id="iLogradouro" value="<?php echo $dados['logradouro']?>">
            </div>

            <div class="input-field col s12">
                <label for="iNumero">Número</label><br>
                <input type="text" name="nNumeroCliente" id="iNumero" value="<?php echo $dados['numero_logradouro']?>">
            </div>

            <div class="input-field col s12">
                <label for="iComplemento">Complemento</label><br>
                <input type="text" name="nComplementoCliente" id="iComplemento" value="<?php echo $dados['complemento_logradouro']?>">
            </div>


            <input type="hidden" name="nTipoAcaoCliente" value="2">
            <input type="hidden" name="nTipoCadastroCliente" value="<?php if($dados['cpf'] == ''){ echo 'cnpj';
                                                                          }else{ echo 'cpf';
                                                                          } ?>">



            <button type="submit" name="btn-editar-cliente" class="btn black">Atualizar</button>

            <a href="../Consulta-Carros.php" class="btn black">Lista de carros</a>
        </form>
    </div>
</div>

<?php
include_once 'includes/footer.php';
?>


