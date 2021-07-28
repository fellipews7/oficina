<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
include_once 'sessoes.php';

function limpezaVariavel($value){
    global $connect;
    $value = mysqli_escape_string($connect, $value);
    $value = htmlspecialchars($value);

    return $value;
}

function isNome($nome){
    $nome = trim($nome);
    $regex  = "/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/";
    if (preg_match($regex, $nome)) {
        return true;
    }else{
        return false;
    }
}

function isEmail($valor){

    if(filter_var($valor, FILTER_VALIDATE_EMAIL)):
        return true;
    else:
        return false;
    endif;
}

function limpaNumero($valor){

    $valor = preg_replace('/[^0-9]/', '', $valor);
    return $valor;

}

function limpaDinheiro($valor){
    $valor = str_replace(".", "", $valor);
    $valor = str_replace(",", ".", $valor);
    $valor = str_replace("R$", "", $valor);
    $valor = trim($valor);

    var_dump($valor);

    return $valor;

}

function limpaTelefone($valor){
    $valor = trim($valor);
    $valor = str_replace("(", "", $valor);
    $valor = str_replace(" ", "", $valor);
    $valor = str_replace(")", "", $valor);
    $valor = str_replace("-", "", $valor);

    return $valor;

}

function limpaPlaca($valor){
    $valor = preg_replace('/[^ a-zA-Z0-9]/', '', $valor);
    return $valor;
}

function isCPF($valor){
    $valor = str_replace(array('.','-','/'), "", $valor);
    $cpf = str_pad(preg_replace('[^0-9]', '', $valor), 11, '0', STR_PAD_LEFT);

    if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999'):
        return false;
    else:
        for ($t = 9; $t < 11; $t++):
            for ($d = 0, $c = 0; $c < $t; $c++) :
                $d += $cpf[$c] * (($t + 1) - $c);
            endfor;
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d):
                return false;
            endif;
        endfor;
        return true;
    endif;
}

function isCNPJ($valor){
    $cnpj = str_pad(str_replace(array('.','-','/'),'',$valor),14,'0',STR_PAD_LEFT);

    if (strlen($cnpj) != 14):
        return false;
    else:
        for($t = 12; $t < 14; $t++):
            for($d = 0, $p = $t - 7, $c = 0; $c < $t; $c++):
                $d += $cnpj[$c] * $p;
                $p  = ($p < 3) ? 9 : --$p;
            endfor;
            $d = ((10 * $d) % 11) % 10;
            if($cnpj[$c] != $d):
                return false;
            endif;
        endfor;
        return true;
    endif;
}

function isCEP($valor){
    if (preg_match('/[0-9]{5,5}([-]?[0-9]{3})?$/', $valor)):
        return true;
    else:
        return false;
    endif;
}


function verificaSeNaoExisteCpf($cpf) {
    global $connect;

    $sql = ("SELECT * FROM clientes where cpf = '$cpf'");


    $result = mysqli_query($connect, $sql);

    if(mysqli_num_rows($result) == 0 OR $_SESSION['tipoAcao'] == 2){
        return true;
    } else {
        return false;
    }

};


function isTelefone($valor){
    var_dump($valor);
    if (preg_match('/[0-9]{2}[0-9]{4,5}[0-9]{4}$/', $valor)):
        return true;
    else:
        var_dump($valor);
        return false;
    endif;
}

function isData($valor){
    if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$valor)) {
        return true;
    } else {
        return false;
    }
}
function isRenavam ( $renavam ) {

    $renavam = str_pad($renavam, 11, "0", STR_PAD_LEFT);

    if( !preg_match("/[0-9]{11}/", $renavam) ){
        return false;
    }

    $renavamSemDigito = substr($renavam, 0, 10);
    $renavamReversoSemDigito = strrev($renavamSemDigito);

    $soma = 0;
    $multiplicador = 2;
    for ($i = 0; $i < 10; $i++) {
        $algarismo = substr($renavamReversoSemDigito, $i, 1);
        $soma += $algarismo * $multiplicador;

        if( $multiplicador >=9 ){
            $multiplicador = 2;
        }else{
            $multiplicador++;
        }
    }

    $mod11 = $soma % 11;

    $ultimoDigitoCalculado = 11 - $mod11;

    $ultimoDigitoCalculado = ($ultimoDigitoCalculado >= 10 ? 0 : $ultimoDigitoCalculado);

    $digitoRealInformado = substr($renavam, -1);

    if($ultimoDigitoCalculado == $digitoRealInformado){
        return true;
    }else{
        return false;
    }

}

function isPlaca($placa){

    $regex1 = '/[A-Z]{2,3}[0-9]{4}|[A-Z]{3,4}[0-9]{3}|[A-Z0-9]{7}/';

    if (preg_match($regex1, $placa)) {
        return true;
    }else{
        return false;
    }
}

function verificaClientes($nomeCliente, $telefoneCliente, $dataNascimentoCliente, $cpfCliente,$emailCliente, $municipioLogradouroCliente,
                          $numeroLogradouroCliente, $estadoLogradouroCliente, $ruaLogradouroCliente,$cepLogradouroCliente,
                          $dataCadastroCliente, $bairroLogradouroCliente, $tipoCadastro, $tipoAcao, $id, $complementoLogradouro){

    if(isNome($nomeCliente)){

        if(isTelefone($telefoneCliente)){

            if(isData($dataNascimentoCliente)){

                if(verificaSeNaoExisteCpf($cpfCliente)){

                    if(verificaCpfCnpj($cpfCliente)){

                        if(isEmail($emailCliente)){

                            if(isCEP($cepLogradouroCliente)){

                                if($tipoAcao == "1") {
                                    cadastraClientes($nomeCliente, $telefoneCliente, $dataNascimentoCliente, $cpfCliente, $emailCliente, $municipioLogradouroCliente,
                                        $numeroLogradouroCliente, $estadoLogradouroCliente, $ruaLogradouroCliente, $cepLogradouroCliente,
                                        $dataCadastroCliente, $bairroLogradouroCliente, $tipoCadastro, $complementoLogradouro);
                                }elseif ($tipoAcao == "2"){
                                    atualizaClientes($nomeCliente, $telefoneCliente, $dataNascimentoCliente, $cpfCliente, $emailCliente, $municipioLogradouroCliente,
                                        $numeroLogradouroCliente, $estadoLogradouroCliente, $ruaLogradouroCliente, $cepLogradouroCliente,
                                        $dataCadastroCliente, $bairroLogradouroCliente, $tipoCadastro, $id, $complementoLogradouro);

                                }
                            }else{
                                $_SESSION['tipoErro'] = 'CEP incorreto!';
                                $_SESSION['mensagem'] = 'erro';

                                if($tipoAcao == "1") {
                                    header('Location: cadastro-cliente.php?errocep');
                                }elseif ($tipoAcao = "2"){
                                    header('Location: ../editarCliente.php?id='.$id);

                                }
                            }
                        }else{
                            $_SESSION['tipoErro'] = 'Email incorreto!';
                            $_SESSION['mensagem'] = 'erro';


                            if($tipoAcao == "1") {
                                header('Location: cadastro-cliente.php?erroemail');
                            }elseif ($tipoAcao == "2"){
                                header('Location: ../editarCliente.php?id='.$id);

                            }

                        }
                    }else{
                        $_SESSION['tipoErro'] = 'CPF incorreto!';
                        $_SESSION['mensagem'] = 'erro';

                        if($tipoAcao == "1") {
                            header('Location: cadastro-cliente.php?errocpf');
                        }elseif ($tipoAcao == "2"){
                            header('Location: ../editarCliente.php?id='.$id);

                        }
                    }
                } else {
                    $_SESSION['tipoErro'] = 'CPF já existe!';
                    $_SESSION['mensagem'] = 'erro';

                    if($tipoAcao == "1") {
                        header('Location: cadastro-cliente.php?errocpf');
                    }elseif ($tipoAcao == "2"){
                        header('Location: ../editarCliente.php?id='.$id);

                    }
                }
            }else{
                $_SESSION['tipoErro'] = 'Data incorreta!';
                $_SESSION['mensagem'] = 'erro';

                if($tipoAcao == "1") {
                    header('Location: cadastro-cliente.php?errodata');
                }elseif ($tipoAcao == "2"){
                    header('Location: ../editarCliente.php?id='.$id);

                }
            }
        }else{
            $_SESSION['tipoErro'] = 'Telefone incorreto!';
            $_SESSION['mensagem'] = 'erro';

            if($tipoAcao == "1") {
                header('Location: cadastro-cliente.php?errotelefone');
            }elseif ($tipoAcao == "2"){
                header('Location: ../editarCliente.php?id='.$id);

            }
        }
    }else{
        $_SESSION['tipoErro'] = 'Nome incorreto!';
        $_SESSION['mensagem'] = 'erro';

        if($tipoAcao == "1") {
            header('Location: cadastro-cliente.php?erronome');
        }elseif ($tipoAcao == "2"){
            header('Location: ../editarCliente.php?id='.$id);

        }
    }

}

function verificaCpfCnpj($cpfCnpj){
    if(isCNPJ($cpfCnpj) or isCPF($cpfCnpj)){
        return true;
    }else{
        return false;
    }
}

function cadastraClientes($nomeCliente, $telefoneCliente, $dataNascimentoCliente, $cpfCnpjCliente,$emailCliente, $municipioLogradouroCliente,
                          $numeroLogradouroCliente, $estadoLogradouroCliente, $ruaLogradouroCliente,$cepLogradouroCliente,
                          $dataCadastroCliente, $bairroLogradouroCliente, $tipoCadastro, $complementoLogradouro){

    $sql = ("INSERT INTO clientes (nome, telefone, data_nascimento, ".$tipoCadastro.", email, municipio, numero_logradouro, estado, logradouro, cep,data_cadastro,bairro, complemento_logradouro) VALUES (

            '$nomeCliente', '$telefoneCliente', '$dataNascimentoCliente', '$cpfCnpjCliente','$emailCliente', '$municipioLogradouroCliente', '$numeroLogradouroCliente', 
            '$estadoLogradouroCliente', '$ruaLogradouroCliente','$cepLogradouroCliente','$dataCadastroCliente', '$bairroLogradouroCliente', '$complementoLogradouro')");

    conexaoBdInsert($sql);
}

function atualizaClientes($nomeCliente, $telefoneCliente, $dataNascimentoCliente, $cpfCnpjCliente, $emailCliente, $municipioLogradouroCliente,
                       $numeroLogradouroCliente, $estadoLogradouroCliente, $ruaLogradouroCliente, $cepLogradouroCliente,
                       $dataCadastroCliente, $bairroLogradouroCliente, $tipoCadastro, $id, $complementoLogradouro){

    $sql = ("UPDATE clientes SET nome = '$nomeCliente', telefone = '$telefoneCliente', data_nascimento = '$dataNascimentoCliente',
            ".$tipoCadastro." = '$cpfCnpjCliente', email = '$emailCliente', municipio = '$municipioLogradouroCliente',
            numero_logradouro = '$numeroLogradouroCliente', estado = '$estadoLogradouroCliente', logradouro = '$ruaLogradouroCliente',
            cep = '$cepLogradouroCliente', data_cadastro = '$dataCadastroCliente', bairro = '$bairroLogradouroCliente', complemento_logradouro = '$complementoLogradouro'
            WHERE id = '$id'");

    conexaoBdInsert($sql);
}

function verificaCarros($placaCarro, $renavamCarro, $marcaCarro, $modeloCarro, $anoModeloCarro,
                        $anoFabricacaoCarro, $tipoAcao, $id){
                  
    if(isRenavam($renavamCarro)){

        if(isPlaca($placaCarro)){

            if($tipoAcao == "1") {
                cadastraCarros($placaCarro, $renavamCarro,$marcaCarro,$modeloCarro,$anoModeloCarro,$anoFabricacaoCarro);
            }elseif ($tipoAcao == "2") {
                atualizaCarros($placaCarro, $renavamCarro, $marcaCarro, $modeloCarro, $anoModeloCarro, $anoFabricacaoCarro, $id);
            }

        }else{
            $_SESSION['tipoErro'] = 'Placa incorreto!';
            $_SESSION['mensagem'] = 'erro';

            if($tipoAcao == "1") {
                header('Location: Cadastro-Carro.php?erroplaca');
            }elseif ($tipoAcao == "2") {
                header('Location: ../editarCarro.php?id=' . $id);
            }

        }
    }else{

        $_SESSION['tipoErro'] = 'Renavam incorreto!';
        $_SESSION['mensagem'] = 'erro';


        if($tipoAcao == "1") {
            header('Location: Cadastro-Carro.php?errorenavam');
        }elseif ($tipoAcao == "2") {
            echo 'renavam';
            header('Location: ../editarCarro.php?id=' . $id);
        }

    }

}

function cadastraCarros($placaCarro, $renavamCarro,$marcaCarro,$modeloCarro,$anoModeloCarro,$anoFabricacaoCarro){
    $sql = ("INSERT  INTO carros(placa,renavam,marca,modelo,ano_modelo,ano_fabricado) VALUES (
            '$placaCarro', '$renavamCarro','$marcaCarro','$modeloCarro','$anoModeloCarro','$anoFabricacaoCarro')");

    conexaoBdInsert($sql);
}

function atualizaCarros($placaCarro, $renavamCarro,$marcaCarro,$modeloCarro,$anoModeloCarro,$anoFabricacaoCarro, $id){
    $sql = ("UPDATE carros  SET placa = '$placaCarro', renavam = '$renavamCarro', marca =  '$marcaCarro', 
                                modelo = '$modeloCarro', ano_modelo = '$anoModeloCarro', ano_fabricado = '$anoFabricacaoCarro'
                                WHERE id = '$id'");

    conexaoBdInsert($sql);
}


function verificaFuncionarios($nomeFuncionario, $cpfFuncionario, $telefoneFuncionario, $idCargoFuncionario, $tipoAcao, $matricula, $loginFuncionario, $senhaFuncionario){
    if(isNome($nomeFuncionario)) {

        if(isCPF($cpfFuncionario)){

            if(isTelefone($telefoneFuncionario)){

                if($senhaFuncionario != "" or $loginFuncionario != "") {

                    if ($tipoAcao == "1") {
                        cadastraFuncionarios($matricula,$nomeFuncionario, $cpfFuncionario, $telefoneFuncionario, $idCargoFuncionario, $loginFuncionario, $senhaFuncionario);
                    } elseif ($tipoAcao == "2") {
                        atualizaFuncionarios($nomeFuncionario, $cpfFuncionario, $telefoneFuncionario, $idCargoFuncionario, $matricula, $loginFuncionario, $senhaFuncionario);
                    }
                }else{
                    $_SESSION['tipoErro'] = 'Login ou senha incorreto!';
                    $_SESSION['mensagem'] = 'erro';

                    if($tipoAcao == "1") {
                        header('Location: Cadastro-Funcionario.php?errologin');
                    }elseif ($tipoAcao == "2"){
                        header('Location: ../editarFuncionario.php?id='.$matricula);
                    }
                }
            }else {
                $_SESSION['tipoErro'] = 'Telefone incorreto!';
                $_SESSION['mensagem'] = 'erro';

                if($tipoAcao == "1") {
                    header('Location: Cadastro-Funcionario.php?errotelefone');
                }elseif ($tipoAcao == "2"){
                    header('Location: ../editarFuncionario.php?id='.$matricula);
                }

            }
        }else{
            $_SESSION['tipoErro'] = 'CPF incorreto!';
            $_SESSION['mensagem'] = 'erro';

            if($tipoAcao == "1") {
                header('Location: Cadastro-Funcionario.php?errocpf');
            }elseif ($tipoAcao == "2"){
                header('Location: ../editarFuncionario.php?id='.$matricula);
            }
        }
    }else{
        $_SESSION['tipoErro'] = 'Nome incorreto!';
        $_SESSION['mensagem'] = 'erro';

        if($tipoAcao == "1") {
            header('Location: Cadastro-Funcionario.php?erronome');
        }elseif ($tipoAcao == "2"){
            header('Location: ../editarFuncionario.php?id='.$matricula);
        }
    }
}

function cadastraFuncionarios($matriculaFuncionario, $nomeFuncionario, $cpfFuncionario, $telefoneFuncionario, $idCargoFuncionario, $loginFuncionario, $senhaFuncionario){

    $sql = ("INSERT INTO funcionarios (nome, cpf, telefone_contato, cargos_id, login, senha) VALUES (
        '$nomeFuncionario', '$cpfFuncionario', '$telefoneFuncionario', '$idCargoFuncionario', '$loginFuncionario', '".md5($senhaFuncionario)."')");
        
    conexaoBdInsert($sql);
}

function atualizaFuncionarios($nomeFuncionario, $cpfFuncionario, $telefoneFuncionario, $idCargoFuncionario, $matricula, $loginFuncionario, $senhaFuncionario){
    $sql = ("UPDATE funcionarios SET nome = '$nomeFuncionario', telefone_contato = '$telefoneFuncionario', cpf =  '$cpfFuncionario', 
                                cargos_id = '$idCargoFuncionario', login = '$loginFuncionario', senha = '$senhaFuncionario' WHERE matricula = '$matricula'");


    conexaoBdInsert($sql);
}

function conexaoBdInsert($sql){
    global $connect;



    if(mysqli_query($connect, $sql)){
        $_SESSION['mensagem'] = "deu";

        if(isset($_SESSION['tipoAcao']) and ($_SESSION['tipoAcao'] == 2)){
            $_SESSION['tipoErro'] = "Atualização feita com sucesso!";
            $_SESSION['tipoAcao'] = 1;
            header('Location: ../../index.php');

        }else{
            $_SESSION['tipoErro'] = "Cadastro feito com sucesso!";
            header('Location: index.php?deu');

        }

    }else{
        $_SESSION['mensagem'] = "erro";
        $_SESSION['tipoErro'] = "Dados únicos duplicados!";

        if(isset($_SESSION['tipoAcao']) and ($_SESSION['tipoAcao'] == 2)){
            header('Location: ../../index.php');

        }else{
            header('Location: index.php?errofinal');
        }
    }
}