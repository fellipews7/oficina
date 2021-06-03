<?php
include_once 'connection.php';
require_once 'assets/php/funcao.php';
session_start();

if(isset($_POST['nCadastrarCliente'])){
    $tipoCadastro = ($_POST['nPessoaFJ']);
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
    global $tipoCadastro;
    $nomeCliente = limpezaVariavel($_POST['nNomeCliente']);
    $telefoneCliente = limpezaVariavel($_POST['nTelefoneCliente']);
    $dataNascimentoCliente = limpezaVariavel($_POST['nDataNascCliente']);
    $municipioLogradouroCliente = limpezaVariavel($_POST['nMunicípioCliente']);
    $numeroLogradouroCliente = limpezaVariavel($_POST['nNumeroCliente']);
    $cpfCnpjCliente = limpezaVariavel($_POST['nCPFCNPJCliente']);
    $emailCliente = limpezaVariavel($_POST['nEmailCliente']);
    $estadoLogradouroCliente = limpezaVariavel($_POST['nEstadoCliente']);
    $bairroLogradouroCliente = limpezaVariavel('bairro');
    $ruaLogradouroCliente = limpezaVariavel($_POST['nRuaCliente']);
    $cepLogradouroCliente = limpezaVariavel($_POST['nCEPCliente']);
    $dataCadastroCliente = date('Y/m/d');

    verificaClientes($nomeCliente, $telefoneCliente, $dataNascimentoCliente, $cpfCnpjCliente,$emailCliente, $municipioLogradouroCliente,
        $numeroLogradouroCliente, $estadoLogradouroCliente, $ruaLogradouroCliente,$cepLogradouroCliente,
        $dataCadastroCliente, $bairroLogradouroCliente, $tipoCadastro);
}

function insertCargos(){
    $nomeCargo = limpezaVariavel($_POST['nNomeCargo']);
    $descricaoCargo = limpezaVariavel($_POST['nDescricaoCargo']);

    $sql = ("INSERT INTO cargos (nome, descricao) VALUES ('$nomeCargo', '$descricaoCargo')");

    conexaoBdInsert($sql);
}

function insertFuncionario(){
    $nomeFuncionario = limpezaVariavel($_POST['nNomeFuncionario']);
    $cpfFuncionario = limpezaVariavel($_POST['nCPFFuncionario']);
    $telefoneFuncionario = limpezaVariavel($_POST['nTelefoneFuncionario']);
    $idCargoFuncionario = limpezaVariavel($_POST['nIDCargoFuncionarios']);

    verificaFuncionarios($nomeFuncionario, $cpfFuncionario, $telefoneFuncionario, $idCargoFuncionario);
}

function insertCarros(){
    $placaCarro = limpezaVariavel($_POST['nPlacaCarro']);
    $modeloCarro = limpezaVariavel($_POST['nModeloCarro']);
    $marcaCarro = limpezaVariavel($_POST['nMarcaCarro']);
    $renavamCarro = limpezaVariavel($_POST['nRenavamCarro']);
    $anoModeloCarro = limpezaVariavel($_POST['nAnodoModeloCarro']);
    $anoFabricacaoCarro = limpezaVariavel($_POST['nAnoFabricacaoCarro']);

    verificaCarros($placaCarro, $modeloCarro, $marcaCarro, $renavamCarro, $anoModeloCarro, $anoFabricacaoCarro);
}

function insertOrcamento(){

    $idCliente = limpezaVariavel($_POST['nIDCLienteOrcamento']);
    $idCarro = limpezaVariavel($_POST['nIDCarroOrcamento']);
    $descricaoServico = limpezaVariavel($_POST['nDescricaoServico']);
    $descricaoProduto = limpezaVariavel($_POST['nDescricaoProduto']);
    $precoMaoObraOrcamento = limpezaVariavel($_POST['nPrecoMaoObraOrcamento']);
    $dataOrcamento = date('Y/m/d');
    $statusOrcamento = limpezaVariavel($_POST['nSttsOrcamento']);
    $valorTotalProduto = limpezaVariavel(50.4);

    $sql = ("INSERT INTO orcamentos(descricao_produtos,valor_total_produtos,descricao_servicos,valor_total_servicos,data,status,clientes_id,carros_id) VALUES(
'$descricaoProduto', '$valorTotalProduto', '$descricaoServico', '$precoMaoObraOrcamento', '$dataOrcamento', '$statusOrcamento', '$idCliente', '$idCarro')");

    conexaoBdInsert($sql);
}

function insertOS(){
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

    $sql = ("INSERT INTO ordem_de_servico(km_atual, problema_registrado, data_cadastro,data_conclusao,data_previsao,status,orcamentos_id,funcionarios_matricula,desconto,valor_final) VALUES(
'$kmCarro', '$problemaRegistrado', '$dataCadastro', '$dataEntregaOs', '$dataPrevisaoEntrega', '$statusOs', '$idOrcamento', '$matriculaFuncionario', '$desconto', '$valorOs')");

    conexaoBdInsert($sql);
}


