<?php
require_once '../../connection.php';
include_once '../../assets/php/funcao.php';

session_start();

if(isset($_POST['btn-editar-cliente'])){
    updateCliente();
}

if(isset($_POST['btn-editar-funcionario'])){
    updateFuncionario();
}

if(isset($_POST['btn-editar-carro'])){
    updateCarros();
}

if(isset($_POST['btn-editar-orcamento'])){
    updateOrcamento();
}

if(isset($_POST['btn-editar-os'])){
    updateOS();
}

function updateCliente(){
    $id                         = limpezaVariavel($_POST['nId']);

    $_SESSION['tipoAcao']       = limpezaVariavel($_POST['nTipoAcaoCliente']);
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


    verificaClientes($nomeCliente, $telefoneCliente, $dataNascimentoCliente, $cpfCnpjCliente,$emailCliente, $municipioLogradouroCliente,
        $numeroLogradouroCliente, $estadoLogradouroCliente, $ruaLogradouroCliente,$cepLogradouroCliente,
        $dataCadastroCliente, $bairroLogradouroCliente, $tipoCadastro, $tipoAcao, $id);
}

function updateFuncionario(){
    $matricula                  = limpezaVariavel($_POST['nMatricula']);
    $_SESSION['tipoAcao']       = limpezaVariavel($_POST['nTipoAcaoCliente']);
    $tipoAcao                   = limpezaVariavel($_POST['nTipoAcao']);
    $nomeFuncionario            = limpezaVariavel($_POST['nNomeFuncionario']);
    $cpfFuncionario             = limpaNumero($_POST['nCPFFuncionario']);
    $telefoneFuncionario        = limpezaVariavel($_POST['nTelefoneFuncionario']);
    $idCargoFuncionario         = limpezaVariavel($_POST['nIDCargoFuncionarios']);


    verificaFuncionarios($nomeFuncionario, $cpfFuncionario, $telefoneFuncionario, $idCargoFuncionario, $tipoAcao, $matricula);
}

function updateCarros(){
    $id                 = limpezaVariavel($_POST['nId']);
    $tipoAcao           = limpezaVariavel($_POST['nTipoAcao']);
    $placaCarro         = limpaPlaca($_POST['nPlacaCarro']);
    $modeloCarro        = limpezaVariavel($_POST['nModeloCarro']);
    $marcaCarro         = limpezaVariavel($_POST['nMarcaCarro']);
    $renavamCarro       = limpaNumero($_POST['nRenavamCarro']);
    $anoModeloCarro     = limpezaVariavel($_POST['nAnodoModeloCarro']);
    $anoFabricacaoCarro = limpezaVariavel($_POST['nAnoFabricacaoCarro']);

    verificaCarros($placaCarro, $renavamCarro, $marcaCarro, $modeloCarro, $anoModeloCarro, $anoFabricacaoCarro, $tipoAcao, $id);
}

function updateOrcamento(){

    $idCliente = limpezaVariavel($_POST['nIDCLienteOrcamento']);
    $idCarro = limpezaVariavel($_POST['nIDCarroOrcamento']);
    $descricaoServico = limpezaVariavel($_POST['nDescricaoServico']);
    $descricaoProduto = limpezaVariavel($_POST['nDescricaoProduto']);
    $precoMaoObraOrcamento = limpezaVariavel($_POST['nPrecoMaoObraOrcamento']);
    $dataOrcamento = date('Y/m/d');
    $statusOrcamento = limpezaVariavel($_POST['nSttsOrcamento']);
    $valorTotalProduto = limpezaVariavel(50.4);

    $sql = ("update INTO orcamentos(descricao_produtos,valor_total_produtos,descricao_servicos,valor_total_servicos,data,status,clientes_id,carros_id) VALUES(
'$descricaoProduto', '$valorTotalProduto', '$descricaoServico', '$precoMaoObraOrcamento', '$dataOrcamento', '$statusOrcamento', '$idCliente', '$idCarro')");

    conexaoBdupdate($sql);
}

function updateOS()
{
    $idOrcamento = limpezaVariavel($_POST['nIDOrcamentoOS']);
    $idCliente = limpezaVariavel($_POST['nIDClienteOS']);
    $idCarro = limpezaVariavel($_POST['nIDCarroOS']);
    $dataCadastro = limpezaVariavel($_POST['nDataCadOS']);
    $dataPrevisaoEntrega = limpezaVariavel($_POST['nDataPrevOS']);
    $dataEntregaOs = limpezaVariavel($_POST['nDataEntregaOS']);
    $problemaRegistrado = limpezaVariavel($_POST['nProblemaOS']);
    $valorOs = limpezaVariavel($_POST['nValorOS']);
    $kmCarro = limpezaVariavel($_POST['nKMOS']);
    $matriculaFuncionario = limpezaVariavel($_POST['nMatriFunOS']);
    $servicos = limpezaVariavel($_POST['nServicosOS']);
    $statusOs = limpezaVariavel($_POST['nSttsOS']);
    $desconto = limpezaVariavel(0);

    $sql = ("update INTO ordem_de_servico(km_atual, problema_registrado, data_cadastro,data_conclusao,data_previsao,status,orcamentos_id,funcionarios_matricula,desconto,valor_final) VALUES(
'$kmCarro', '$problemaRegistrado', '$dataCadastro', '$dataEntregaOs', '$dataPrevisaoEntrega', '$statusOs', '$idOrcamento', '$matriculaFuncionario', '$desconto', '$valorOs')");

    conexaoBdupdate($sql);

}