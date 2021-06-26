<?php
session_start();

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

function limpaPlaca($valor){
    $valor = preg_replace('/^[A-Za-z0-9-]+$/', '', $valor);
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

function isTelefone($valor){
    if (preg_match('/[0-9]{2}[0-9]{4,5}[0-9]{4}$/', $valor)):
        return true;
    else:
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
    var_dump($placa);
    $regex1 = '/[A-Z]{2,3}[0-9]{4}|[A-Z]{3,4}[0-9]{3}|[A-Z0-9]{7}/';

    if (preg_match($regex1, $placa)) {
        return true;
    }else{
        return false;
    }
}

function verificaClientes($nomeCliente, $telefoneCliente, $dataNascimentoCliente, $cpfCliente,$emailCliente, $municipioLogradouroCliente,
                          $numeroLogradouroCliente, $estadoLogradouroCliente, $ruaLogradouroCliente,$cepLogradouroCliente,
                          $dataCadastroCliente, $bairroLogradouroCliente, $tipoCadastro, $tipoAcao, $id){

    if(isNome($nomeCliente)){

        if(isTelefone($telefoneCliente)){

            if(isData($dataNascimentoCliente)){

                if(verificaCpfCnpj($cpfCnpjCliente)){

                    if(isEmail($emailCliente)){

                        if(isCEP($cepLogradouroCliente)){


                            if($tipoAcao == "1") {
                                cadastraClientes($nomeCliente, $telefoneCliente, $dataNascimentoCliente, $cpfCnpjCliente, $emailCliente, $municipioLogradouroCliente,
                                    $numeroLogradouroCliente, $estadoLogradouroCliente, $ruaLogradouroCliente, $cepLogradouroCliente,
                                    $dataCadastroCliente, $bairroLogradouroCliente, $tipoCadastro);
                            }elseif ($tipoAcao == "2"){
                                updateClientes($nomeCliente, $telefoneCliente, $dataNascimentoCliente, $cpfCnpjCliente, $emailCliente, $municipioLogradouroCliente,
                                    $numeroLogradouroCliente, $estadoLogradouroCliente, $ruaLogradouroCliente, $cepLogradouroCliente,
                                    $dataCadastroCliente, $bairroLogradouroCliente, $tipoCadastro, $id);

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
            }else{
                $_SESSION['tipoErro'] = 'Data incorreta!';
                $_SESSION['mensagem'] = 'erro';

                if($tipoAcao == "1") {
                    header('Location: Consultar-Cliente.php?errodata');
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
                          $dataCadastroCliente, $bairroLogradouroCliente, $tipoCadastro){

    $sql = ("INSERT INTO clientes (nome, telefone, data_nascimento, ".$tipoCadastro.", email, municipio, numero_logradouro, estado, logradouro, cep,data_cadastro,bairro) VALUES (

            '$nomeCliente', '$telefoneCliente', '$dataNascimentoCliente', '$cpfCnpjCliente','$emailCliente', '$municipioLogradouroCliente', '$numeroLogradouroCliente', 
            '$estadoLogradouroCliente', '$ruaLogradouroCliente','$cepLogradouroCliente','$dataCadastroCliente', '$bairroLogradouroCliente')");

    conexaoBdInsert($sql);
}

function updateClientes($nomeCliente, $telefoneCliente, $dataNascimentoCliente, $cpfCnpjCliente, $emailCliente, $municipioLogradouroCliente,
                       $numeroLogradouroCliente, $estadoLogradouroCliente, $ruaLogradouroCliente, $cepLogradouroCliente,
                       $dataCadastroCliente, $bairroLogradouroCliente, $tipoCadastro, $id){

    $sql = ("UPDATE clientes SET nome = '$nomeCliente', telefone = '$telefoneCliente', data_nascimento = '$dataNascimentoCliente',
            ".$tipoCadastro." = '$cpfCnpjCliente', email = '$emailCliente', municipio = '$municipioLogradouroCliente',
            numero_logradouro = '$numeroLogradouroCliente', estado = '$estadoLogradouroCliente', logradouro = '$ruaLogradouroCliente',

            cep = '$cepLogradouroCliente', data_cadastro = '$dataCadastroCliente', bairro = '$bairroLogradouroCliente'
            WHERE id = '$id'");

    conexaoBdInsert($sql);
}

function verificaCarros($placaCarro, $renavamCarro, $marcaCarro, $modeloCarro, $anoModeloCarro,
                        $anoFabricacaoCarro, $tipoAcao, $id){
                  
    if(isRenavam($renavamCarro)){

        if(isPlaca($placaCarro)){

            cadastraCarros($placaCarro, $renavamCarro,$marcaCarro,$modeloCarro,$anoModeloCarro,$anoFabricacaoCarro);

        }else{
            $_SESSION['tipoErro'] = 'Placa incorreto!';
            $_SESSION['mensagem'] = 'erro';
            header('Location: Cadastro-Carro.php?erroplaca');
        }
    }else{
        $_SESSION['tipoErro'] = 'Renavam incorreto!';
        $_SESSION['mensagem'] = 'erro';
        header('Location: Cadastro-Carro.php?errorenavam');
    }
}

function cadastraCarros($placaCarro, $renavamCarro,$marcaCarro,$modeloCarro,$anoModeloCarro,$anoFabricacaoCarro){
    $sql = ("INSERT  INTO carros(placa,renavam,marca,modelo,ano_modelo,ano_fabricado) VALUES (
            '$placaCarro', '$renavamCarro','$marcaCarro','$modeloCarro','$anoModeloCarro','$anoFabricacaoCarro')");

    conexaoBdInsert($sql);
}


function verificaFuncionarios($nomeFuncionario, $cpfFuncionario, $telefoneFuncionario, $idCargoFuncionario, $tipoAcao, $matricula){
    if(isNome($nomeFuncionario)) {

        if(isCPF($cpfFuncionario)){

            if(isTelefone($telefoneFuncionario)){

                if($tipoAcao == "1") {
                    cadastraFuncionarios($nomeFuncionario, $cpfFuncionario, $telefoneFuncionario, $idCargoFuncionario);
                }elseif ($tipoAcao == "2"){
                    updateFuncionarios($nomeFuncionario, $cpfFuncionario, $telefoneFuncionario, $idCargoFuncionario, matricula);
                }

            }else {
                $_SESSION['tipoErro'] = 'Telefone incorreto!';
                $_SESSION['mensagem'] = 'erro';

                if($tipoAcao == "1") {
                    header('Location: Cadastro-Funcionario.php?errotelefone');
                }elseif ($tipoAcao == "2"){
                    header('Location: ../editarFuncionario.php?id='.$id);
                }

            }
        }else{
            $_SESSION['tipoErro'] = 'CPF incorreto!';
            $_SESSION['mensagem'] = 'erro';

            if($tipoAcao == "1") {
                header('Location: Cadastro-Funcionario.php?errocpf');
            }elseif ($tipoAcao == "2"){
                header('Location: ../editarFuncionario.php?id='.$id);
            }
        }
    }else{
        $_SESSION['tipoErro'] = 'Nome incorreto!';
        $_SESSION['mensagem'] = 'erro';

        if($tipoAcao == "1") {
            header('Location: Cadastro-Funcionario.php?erronome');
        }elseif ($tipoAcao == "2"){
            header('Location: ../editarFuncionario.php?id='.$id);
        }
    }
}

function cadastraFuncionarios($nomeFuncionario, $cpfFuncionario, $telefoneFuncionario, $idCargoFuncionario){

    $sql = ("INSERT INTO funcionarios (matricula, nome, cpf, telefone_contato, cargos_id) VALUES (
            '$nomeFuncionario', '$cpfFuncionario', '$telefoneFuncionario', '$idCargoFuncionario')");

    conexaoBdInsert($sql);
}

function updateFuncionarios($nomeFuncionario, $cpfFuncionario, $telefoneFuncionario, $idCargoFuncionario, $matricula){
    $sql = ("UPDATE clientes SET nome = '$nomeFuncionario', telefone = '$telefoneFuncionario', cpf =  '$cpfFuncionario', 
                                 cargos_id = '$idCargoFuncionario', matricula = '$matricula' WHERE matricula = '$matricula'");

    conexaoBdInsert($sql);
}


function conexaoBdInsert($sql){
    global $connect;
    if(mysqli_query($connect, $sql)){
        $_SESSION['mensagem'] = "deu";

        if(isset($_SESSION['tipoAcao']) and ($_SESSION['tipoAcao'] == 2)){
            $_SESSION['tipoErro'] = "Atualização feita com sucesso!";
            header('Location: ../../index.php');
        }else{
            $_SESSION['tipoErro'] = "Cadastro feito com sucesso!";
            header('Location: index.php?deu');
        }
    }else{
        $_SESSION['mensagem'] = "erro";
        $_SESSION['tipoErro'] = "Erro ao escrever no banco!";

        if(isset($_SESSION['tipoAcao']) and ($_SESSION['tipoAcao'] == 2)){
            header('Location: ../../index.php');
        }else{
            header('Location: index.php?errofinal');
        }
    }
}