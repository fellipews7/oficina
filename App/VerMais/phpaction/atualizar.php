<?php
require_once '../../connection.php';
include_once '../../assets/php/funcao.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if(isset($_POST['btn-editar-cliente'])){
    updateCliente();
}

if(isset($_POST['btn-editar-funcionario'])){
    updateFuncionario();
}

if(isset($_POST['btn-editar-carro'])){
    updateCarro();
}

if(isset($_POST['btn-editar-orcamento'])){
    updateOrcamento();
}

if(isset($_POST['btn-editar-os'])){
    updateOS();
}

function updateCliente(){
    $id                         = limpezaVariavel($_POST['nId']);
    $_SESSION['tipoAcao']       = 2;
    $tipoAcao                   = limpezaVariavel($_POST['nTipoAcaoCliente']);
    $tipoCadastro               = limpezaVariavel($_POST['nTipoCadastroCliente']);
    $nomeCliente                = limpezaVariavel($_POST['nNomeCliente']);
    $telefoneCliente            = limpaNumero($_POST['nTelefoneCliente']);
    $dataNascimentoCliente      = limpezaVariavel($_POST['nDataNascCliente']);
    $municipioLogradouroCliente = limpezaVariavel($_POST['nMunicipioCliente']);
    $numeroLogradouroCliente    = limpezaVariavel($_POST['nNumeroCliente']);
    $cpfCnpjCliente             = limpaNumero($_POST['nCPFCNPJCLiente']);
    $emailCliente               = limpezaVariavel($_POST['nEmailCliente']);
    $estadoLogradouroCliente    = limpezaVariavel($_POST['nEstadoCliente']);
    $bairroLogradouroCliente    = limpezaVariavel($_POST['nBairroCliente']);
    $ruaLogradouroCliente       = limpezaVariavel($_POST['nRuaCliente']);
    $cepLogradouroCliente       = limpezaVariavel($_POST['nCEPCliente']);
    $dataCadastroCliente        = date('Y/m/d');
    $complementoLogradouro      = limpezaVariavel($_POST['nComplementoCliente']);


    verificaClientes($nomeCliente, $telefoneCliente, $dataNascimentoCliente, $cpfCnpjCliente,$emailCliente, $municipioLogradouroCliente,
        $numeroLogradouroCliente, $estadoLogradouroCliente, $ruaLogradouroCliente,$cepLogradouroCliente,
        $dataCadastroCliente, $bairroLogradouroCliente, $tipoCadastro, $tipoAcao, $id, $complementoLogradouro);
}

function updateFuncionario(){
    $matricula                  = limpezaVariavel($_POST['nMatricula']);
    $_SESSION['tipoAcao']       = 2;
    $tipoAcao                   = limpezaVariavel($_POST['nTipoAcao']);
    $nomeFuncionario            = limpezaVariavel($_POST['nNome']);
    $cpfFuncionario             = limpaNumero($_POST['nCpf']);
    $telefoneFuncionario        = limpezaVariavel($_POST['nTelefone']);
    $idCargoFuncionario         = limpezaVariavel($_POST['nCargo']);
    $loginFuncionario           = limpezaVariavel($_POST['nLogin']);
    $senhaFuncionario           = limpezaVariavel($_POST['nSenha']);


    verificaFuncionarios($nomeFuncionario, $cpfFuncionario, $telefoneFuncionario, $idCargoFuncionario, $tipoAcao, $matricula, $loginFuncionario, $senhaFuncionario);
}

function updateCarro(){
    $id                   = limpezaVariavel($_POST['nId']);
    $tipoAcao             = 2;
    $_SESSION['tipoAcao'] = limpezaVariavel($_POST['nTipoAcao']);
    $placaCarro           = limpaPlaca($_POST['nPlaca']);
    $modeloCarro          = limpezaVariavel($_POST['nModelo']);
    $marcaCarro           = limpezaVariavel($_POST['nMarca']);
    $renavamCarro         = limpaNumero($_POST['nRenavam']);
    $anoModeloCarro       = limpezaVariavel($_POST['nAnoMod']);
    $anoFabricacaoCarro   = limpezaVariavel($_POST['nAnoFab']);

    verificaCarros($placaCarro, $renavamCarro, $marcaCarro, $modeloCarro, $anoModeloCarro, $anoFabricacaoCarro, $tipoAcao, $id);
}

function updateOrcamento(){
    $id = limpezaVariavel($_POST['nId']);
    $_SESSION['tipoAcao'] = 2;
    $idCliente = limpezaVariavel($_POST['nIDCliente']);
    $idCarro = limpezaVariavel($_POST['nIDCarro']);
    $descricaoServico = limpezaVariavel($_POST['nDescServ']);
    $descricaoProduto = limpezaVariavel($_POST['nDescPro']);
    $precoMaoObraOrcamento = limpezaVariavel($_POST['nPrecoObra']);
    $dataOrcamento = limpezaVariavel($_POST['nDataOrc']);
    $statusOrcamento = limpezaVariavel($_POST['nStatus']);
    $valorTotalProduto = limpezaVariavel($_POST['nPrecoPro']);

    $sql = ("UPDATE orcamentos SET clientes_id = '$idCliente', carros_id = '$idCarro', descricao_servicos =  '$descricaoServico', 
                               descricao_produtos = '$descricaoProduto', valor_total_servicos = '$precoMaoObraOrcamento', 
                               data = '$dataOrcamento', status = '$statusOrcamento', valor_total_produtos = '$valorTotalProduto' 
                               WHERE id = '$id'");

    conexaoBdInsert($sql);
}

function updateOS()
{
    $_SESSION['tipoAcao'] = 2;
    $id                   = limpezaVariavel($_POST['nId']);
    $idOrcamento          = limpezaVariavel($_POST['nIDOrcamento']);
    $dataCadastro         = limpezaVariavel($_POST['nDataCad']);
    $dataPrevisaoEntrega  = limpezaVariavel($_POST['nDataPrev']);
    $dataEntregaOs        = limpezaVariavel($_POST['nDataEnt']);
    $valorOs              = limpezaVariavel($_POST['nValor']);
    $kmCarro              = limpezaVariavel($_POST['nKM']);
    $matriculaFuncionario = limpezaVariavel($_POST['nMatriFun']);
    //$servicos             = limpezaVariavel($_POST['nServicos']);
    $statusOs             = limpezaVariavel($_POST['nStatus']);
    //$desconto             = limpezaVariavel(0);
    $infoAdicionais       = limpezaVariavel($_POST['nInfoAdicionais']);

    $sql = ("UPDATE ordens_de_servicos SET data_cadastro = '$dataCadastro', data_previsao = '$dataPrevisaoEntrega', 
                                           data_conclusao =  '$dataEntregaOs', 
                                           valor_final = '$valorOs', km_atual = '$kmCarro', funcionarios_matricula = '$matriculaFuncionario',
                                           status = '$statusOs', orcamentos_id = '$idOrcamento', informacoes_adicionais = '$infoAdicionais' 
                                           WHERE id = '$id'");
    conexaoBdInsert($sql);

}