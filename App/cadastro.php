<?php
include_once 'connection.php';
include_once 'assets/php/funcao.php';
include_once 'assets/php/sessoes.php';
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if(isset($_POST['nCadastrarCliente'])){
    insertCliente();
}

if(isset($_POST['nEnviarCargo'])){
    insertCargos();
}

if(isset($_POST['nCadastrarFuncionarios'])){
    insertFuncionario();
}

if(isset($_POST['nCadastrarCarros'])){
    insertCarros();
}

if(isset($_POST['nCadastrarOrcamento'])){
    insertOrcamento();
}

if(isset($_POST['nCadastrarOS'])){
    insertOS();
}

function insertCliente(){
    
    $id                         = null;
    $tipoAcao                   = limpezaVariavel($_POST['nTipoAcao']);
    $tipoCadastro               = limpezaVariavel($_POST['nPessoaFJ']);
    $nomeCliente                = limpezaVariavel($_POST['nNomeCliente']);
    $telefoneCliente            = limpaNumero($_POST['nTelefoneCliente']);
    $dataNascimentoCliente      = limpezaVariavel($_POST['nDataNascCliente']);
    $municipioLogradouroCliente = limpezaVariavel($_POST['nMunicipioCliente']);
    $numeroLogradouroCliente    = limpezaVariavel($_POST['nNumeroCliente']);
    $cpfCnpjCliente             = limpaNumero(($_POST['nCpfCliente']) . ($_POST['nCnpjCliente']));
    $emailCliente               = limpezaVariavel($_POST['nEmailCliente']);
    $estadoLogradouroCliente    = limpezaVariavel($_POST['nEstadoCliente']);
    $bairroLogradouroCliente    = limpezaVariavel($_POST['nBairroCliente']);
    $ruaLogradouroCliente       = limpezaVariavel($_POST['nRuaCliente']);
    $cepLogradouroCliente       = limpaNumero($_POST['nCEPCliente']);
    $dataCadastroCliente        = date('Y/m/d');
    $complementoCliente         = limpezaVariavel($_POST['nComplementoCliente']);

    setSessaoClientes();

    verificaClientes($nomeCliente, $telefoneCliente, $dataNascimentoCliente, $cpfCnpjCliente,$emailCliente, $municipioLogradouroCliente,
        $numeroLogradouroCliente, $estadoLogradouroCliente, $ruaLogradouroCliente,$cepLogradouroCliente,
        $dataCadastroCliente, $bairroLogradouroCliente, $tipoCadastro, $tipoAcao, $id, $complementoCliente);

}

function insertCargos(){
    $_SESSION['tipoAcao'] = 1;
    $nomeCargo = limpezaVariavel($_POST['nNomeCargo']);
    $descricaoCargo = limpezaVariavel($_POST['nDescricaoCargo']);

    $sql = ("INSERT INTO cargos (nome, descricao) VALUES ('$nomeCargo', '$descricaoCargo')");


    conexaoBdInsert($sql);
}

function insertFuncionario(){
    $matricula           = null;
    $tipoAcao            = limpezaVariavel($_POST['nTipoAcao']);
    $nomeFuncionario     = limpezaVariavel($_POST['nNomeFuncionario']);
    $cpfFuncionario      = limpaNumero($_POST['nCPFFuncionario']);
    $telefoneFuncionario = limpaTelefone($_POST['nTelefoneFuncionario']);
    $idCargoFuncionario  = limpezaVariavel($_POST['nIDCargoFuncionarios']);
    $senhaFuncionario    = limpezaVariavel($_POST['nSenha']);
    $loginFuncionario    = limpezaVariavel($_POST['nUsuario']);

    setSessaoFunc();

    verificaFuncionarios($nomeFuncionario, $cpfFuncionario, $telefoneFuncionario, $idCargoFuncionario, $tipoAcao, $matricula, $loginFuncionario, $senhaFuncionario);

}

function insertCarros(){
    $id                 = null;
    $tipoAcao           = limpezaVariavel($_POST['nTipoAcao']);
    $placaCarro         = limpaPlaca($_POST['nPlacaCarro']);
    $modeloCarro        = limpezaVariavel($_POST['nModeloCarro']);
    $marcaCarro         = limpezaVariavel($_POST['nMarcaCarro']);
    $renavamCarro       = limpaNumero($_POST['nRenavamCarro']);
    $anoModeloCarro     = limpezaVariavel($_POST['nAnodoModeloCarro']);
    $anoFabricacaoCarro = limpezaVariavel($_POST['nAnoFabricacaoCarro']);

    setSessaoCarros();

    verificaCarros($placaCarro, $renavamCarro, $marcaCarro, $modeloCarro, $anoModeloCarro, $anoFabricacaoCarro, $tipoAcao, $id);
}

function insertOrcamento(){

    $_SESSION['tipoAcao'] = 1;
    $idCliente             = limpezaVariavel($_POST['nIDCLienteOrcamento']);
    $idCarro               = limpezaVariavel($_POST['nIDCarroOrcamento']);
    $descricaoServico      = limpezaVariavel($_POST['nDescricaoServico']);
    $descricaoProduto      = limpezaVariavel($_POST['nDescricaoProduto']);
    $precoMaoObraOrcamento = limpaDinheiro($_POST['nPrecoMaoObraOrcamento']);
    $dataOrcamento         = date('Y/m/d');
    $statusOrcamento       = 3;
    $tipoManutencao        = limpezaVariavel($_POST['nTipoManu']);
    $valorTotalProduto     = limpaDinheiro($_POST['nPrecoTotalProOrcamento']);

    $sql = ("INSERT INTO orcamentos(descricao_produtos,valor_total_produtos,descricao_servicos,valor_total_servicos,data,status,clientes_id,carros_id, tipoManutencao) VALUES(
            '$descricaoProduto', '$valorTotalProduto', '$descricaoServico', '$precoMaoObraOrcamento', '$dataOrcamento', '$statusOrcamento', '$idCliente', '$idCarro', '$tipoManutencao')");

    conexaoBdInsert($sql);
}

function insertOS(){

    $_SESSION['tipoAcao'] = 1;
    $idOrcamento          = limpezaVariavel($_POST['nIDOrcamentoOS']);
    $dataCadastro         = date('Y/m/d');
    $dataPrevisaoEntrega  = limpezaVariavel($_POST['nDataPrevOS']);
    $kmCarro              = limpezaVariavel($_POST['nKMOS']);
    $matriculaFuncionario = limpezaVariavel($_POST['nMatriFunOS']);
    $statusOs             = 1;
    $valorFinalOs         = limpaNumero($_POST['nValorTotalOS']);
    $infoAdicionais       = limpezaVariavel($_POST['nInfoAdicionais']);

$sql1 = ("INSERT INTO ordens_de_servicos(km_atual,  data_cadastro,data_previsao,status,orcamentos_id,funcionarios_matricula,valor_final, informacoes_adicionais) VALUES(
    '$kmCarro', '$dataCadastro','$dataPrevisaoEntrega','$statusOs', '$idOrcamento', '$matriculaFuncionario','$valorFinalOs', '$infoAdicionais')");

global $connect;

$sql2 = ("UPDATE orcamentos SET status='1' WHERE id='$idOrcamento'");


if(mysqli_query($connect, $sql1)){
    $_SESSION['mensagem'] = "deu";
    $_SESSION['tipoErro'] = "Cadastro feito com sucesso!";
    if(mysqli_query($connect, $sql2)) {
        header('Location: index.php?deu');
    }
}else{
    $_SESSION['mensagem'] = "erro";
    $_SESSION['tipoErro'] = "Dados únicos duplicados!";
    header('Location: index.php?errofinal');
}

}


