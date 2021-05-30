<?php
include_once 'connection.php';
require_once 'assets/php/funcao.php';
session_start();

if(isset($_POST['nCadastrarCliente'])){
    $tipoCadastro = ($_POST['nPessoaFJ']);
    if($tipoCadastro == 1){
        insertClienteCPF();
    }else{
        insertClienteCNPJ();
    }
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

function insertClienteCPF(){
    $nomeCliente = limpezaVariavel($_POST['nNomeCliente']);
    $telefoneCliente = limpezaVariavel($_POST['nTelefoneCliente']);
    $dataNascimentoCliente = limpezaVariavel($_POST['nDataNascCliente']);
    $municipioLogradouroCliente = limpezaVariavel($_POST['nMunicípioCliente']);
    $numeroLogradouroCliente = limpezaVariavel($_POST['nNumeroCliente']);
    $cpfCliente = limpezaVariavel($_POST['nCPFCNPJCliente']);
    $emailCliente = limpezaVariavel($_POST['nEmailCliente']);
    $estadoLogradouroCliente = limpezaVariavel($_POST['nEstadoCliente']);
    $bairroLogradouroCliente = limpezaVariavel('bairro');
    $ruaLogradouroCliente = limpezaVariavel($_POST['nRuaCliente']);
    $cepLogradouroCliente = limpezaVariavel($_POST['nCEPCliente']);
    $dataCadastroCliente = date('Y/m/d');

    $sql = ("INSERT INTO clientes (nome, telefone, data_nascimento, cpf, email, municipio, numero_logradouro, estado, logradouro, cep,data_cadastro,bairro) VALUES (
            '$nomeCliente', '$telefoneCliente', '$dataNascimentoCliente', '$cpfCliente','$emailCliente', '$municipioLogradouroCliente', '$numeroLogradouroCliente', 
            '$estadoLogradouroCliente', '$ruaLogradouroCliente','$cepLogradouroCliente','$dataCadastroCliente', '$bairroLogradouroCliente')");

    conexaoBdInsert($sql);
}

function insertClienteCNPJ(){
    $nomeCliente = limpezaVariavel($_POST['nNomeCliente']);
    $telefoneCliente = limpezaVariavel($_POST['nTelefoneCliente']);
    $dataNascimentoCliente = limpezaVariavel($_POST['nDataNascCliente']);
    $municipioLogradouroCliente = limpezaVariavel($_POST['nMunicípioCliente']);
    $numeroLogradouroCliente = limpezaVariavel($_POST['nNumeroCliente']);
    $cnpjCliente = limpezaVariavel($_POST['nCPFCNPJCliente']);
    $emailCliente = limpezaVariavel($_POST['nEmailCliente']);
    $estadoLogradouroCliente = limpezaVariavel($_POST['nEstadoCliente']);
    $bairroLogradouroCliente = limpezaVariavel('bairro');
    $ruaLogradouroCliente = limpezaVariavel($_POST['nRuaCliente']);
    $cepLogradouroCliente = limpezaVariavel($_POST['nCEPCliente']);
    $dataCadastroCliente = date('Y/m/d');

    $sql = ("INSERT INTO clientes (nome, telefone, data_nascimento, cnpj, email, municipio, numero_logradouro, estado, logradouro, cep,data_cadastro,bairro) VALUES (
            '$nomeCliente', '$telefoneCliente', '$dataNascimentoCliente', '$cnpjCliente','$emailCliente', '$municipioLogradouroCliente', '$numeroLogradouroCliente', 
            '$estadoLogradouroCliente', '$ruaLogradouroCliente','$cepLogradouroCliente','$dataCadastroCliente', '$bairroLogradouroCliente')");

    conexaoBdInsert($sql);
}

function insertCargos(){
    $idCargo = limpezaVariavel($_POST['nIDCargoCargos']);
    $nomeCargo = limpezaVariavel($_POST['nNomeCargo']);
    $descricaoCargo = limpezaVariavel($_POST['nDescricaoCargo']);

    $sql = ("INSERT INTO cargos (id, nome, descricao) VALUES ('$idCargo', '$nomeCargo', '$descricaoCargo')");

    conexaoBdInsert($sql);
}

function insertFuncionario(){
    $nomeFuncionario = limpezaVariavel($_POST['nNomeFuncionario']);
    $cpfFuncionario = limpezaVariavel($_POST['nCPFFuncionario']);
    $telefoneFuncionario = limpezaVariavel($_POST['nTelefoneFuncionario']);
    $matriculaFuncionario = limpezaVariavel($_POST['nMatriculaFuncionario']);
    $idCargoFuncionario = limpezaVariavel($_POST['nIDCargoFuncionarios']);

    $sql = ("INSERT INTO funcionarios (matricula, nome, cpf, telefone_contato, cargos_id) VALUES (
            '$matriculaFuncionario', '$nomeFuncionario', '$cpfFuncionario', '$telefoneFuncionario', '$idCargoFuncionario')");

    conexaoBdInsert($sql);
}

function insertCarros(){
    $placaCarro = limpezaVariavel($_POST['nPlacaCarro']);
    $modeloCarro = limpezaVariavel($_POST['nModeloCarro']);
    $marcaCarro = limpezaVariavel($_POST['nMarcaCarro']);
    $renavamCarro = limpezaVariavel($_POST['nRenavamCarro']);
    $anoModeloCarro = limpezaVariavel($_POST['nAnodoModeloCarro']);
    $anoFabricacaoCarro = limpezaVariavel($_POST['nAnoFabricacaoCarro']);

    $sql = ("INSERT  INTO carros(placa,renavam,marca,modelo,ano_modelo,ano_fabricado) VALUES (
            '$placaCarro', '$renavamCarro','$marcaCarro','$modeloCarro','$anoModeloCarro','$anoFabricacaoCarro')");
    
    conexaoBdInsert($sql);
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

function conexaoBdInsert($sql){
    global $connect;
    if(mysqli_query($connect, $sql)){
        $_SESSION['mensagem'] = "deu";
        header('Location: index.php');
    }else{
        $_SESSION['mensagem'] = "erro";
        header('Location: index.php');
    }
}

