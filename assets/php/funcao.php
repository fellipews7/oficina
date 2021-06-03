<?php
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

function isCPF($valor){
    $valor = str_replace(array('.','-','/'), "", $valor);
    $cpf = str_pad(preg_replace('[^0-9]', '', $valor), 11, '0', STR_PAD_LEFT);

    if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999'):
        return false;
    else:
        for ($t = 9; $t < 11; $t++):
            for ($d = 0, $c = 0; $c < $t; $c++) :
                $d += $cpf{$c} * (($t + 1) - $c);
            endfor;
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d):
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
                $d += $cnpj{$c} * $p;
                $p  = ($p < 3) ? 9 : --$p;
            endfor;
            $d = ((10 * $d) % 11) % 10;
            if($cnpj{$c} != $d):
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
    if (preg_match('/^\([0-9]{2}\)?\s?[0-9]{4,5}-[0-9]{4}$/', $valor)):
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
    $soma = 0;

    $d = str_split($renavam);
    $x = 0;
    $digito = 0;

    for ($i=5; $i >= 2; $i--) {
        $soma += $d[$x] * $i;
        $x++;
    }

    $valor = $soma % 11;

    if ($valor == 11 || $valor == 0 || $valor >= 10) {
        $digito = 0;
    } else {
        $digito = $valor;
    }

    if ($digito == $d[4]) {
        return true;
    } else {
        return false;
    }
}

function isPlaca(){
    $regex1 = '[A-Z]{2,3}[0-9]{4}|[A-Z]{3,4}[0-9]{3}|[A-Z0-9]{7}';
    $placa = 'AAA0A00';

    if (preg_match($regex1, $placa) === 1) {
        return true;
    }else{
        return false;
    }
}

function verificaClientes($nomeCliente, $telefoneCliente, $dataNascimentoCliente, $cpfCnpjCliente,$emailCliente, $municipioLogradouroCliente,
                          $numeroLogradouroCliente, $estadoLogradouroCliente, $ruaLogradouroCliente,$cepLogradouroCliente,
                          $dataCadastroCliente, $bairroLogradouroCliente, $tipoCadastro){

    if(isNome($nomeCliente)){
        if(isTelefone($telefoneCliente)){
            if(isData($dataNascimentoCliente)){
                if(verificaCpfCnpj($cpfCnpjCliente)){
                    if(isEmail($emailCliente)){
                        if(isCEP($cepLogradouroCliente)){
                            cadastraClientes($nomeCliente, $telefoneCliente, $dataNascimentoCliente, $cpfCnpjCliente,$emailCliente, $municipioLogradouroCliente,
                                $numeroLogradouroCliente, $estadoLogradouroCliente, $ruaLogradouroCliente,$cepLogradouroCliente,
                                $dataCadastroCliente, $bairroLogradouroCliente, $tipoCadastro);
                        }else{
                            $_SESSION['tipoErro'] = 'CEP incorreto!';
                            header('Location: cadastro-cliente.php?erro');
                        }
                    }else{
                        $_SESSION['tipoErro'] = 'Email incorreto!';
                        header('Location: cadastro-cliente.php?erro');
                    }
                }else{
                    $_SESSION['tipoErro'] = 'CPF incorreto!';
                    header('Location: cadastro-cliente.php?erro');
                }
            }else{
                $_SESSION['tipoErro'] = 'Data incorreta!';
                header('Location: cadastro-cliente.php?erro');
            }
        }else{
            $_SESSION['tipoErro'] = 'Telefone incorreto!';
            header('Location: cadastro-cliente.php?erro');
        }
    }else{
        $_SESSION['tipoErro'] = 'Nome incorreto!';
        header('Location: cadastro-cliente.php?erro');
    }
}

function verificaCpfCnpj($cnpj, $cpf){
    if(isCNPJ($cnpj)){
        return true;
    }elseif (isCPF($cpf)){
        return true;
    }else{
        return false;
    }
}

function cadastraClientes($nomeCliente, $telefoneCliente, $dataNascimentoCliente, $cpfCliente,$emailCliente, $municipioLogradouroCliente,
                          $numeroLogradouroCliente, $estadoLogradouroCliente, $ruaLogradouroCliente,$cepLogradouroCliente,
                          $dataCadastroCliente, $bairroLogradouroCliente){
    $sql = ("INSERT INTO clientes (nome, telefone, data_nascimento, cpf, email, municipio, numero_logradouro, estado, logradouro, cep,data_cadastro,bairro) VALUES (
            '$nomeCliente', '$telefoneCliente', '$dataNascimentoCliente', '$cpfCliente','$emailCliente', '$municipioLogradouroCliente', '$numeroLogradouroCliente', 
            '$estadoLogradouroCliente', '$ruaLogradouroCliente','$cepLogradouroCliente','$dataCadastroCliente', '$bairroLogradouroCliente')");

    conexaoBdInsert($sql);
}

function verificaCarros($placaCarro, $renavamCarro, $marcaCarro, $modeloCarro, $anoModeloCarro, $anoFabricacaoCarro){
    if(isRenavam($renavamCarro)){
        if(isPlaca($placaCarro)){
            cadastraCarros($placaCarro, $renavamCarro,$marcaCarro,$modeloCarro,$anoModeloCarro,$anoFabricacaoCarro);
        }else{
            $_SESSION['tipoErro'] = 'Renavam incorreto!';
            header('Location: cadastro-cliente.php?erro');
        }
    }else{
        $_SESSION['tipoErro'] = 'Renavam incorreto!';
        header('Location: cadastro-cliente.php?erro');
    }
}

function cadastraCarros($placaCarro, $renavamCarro,$marcaCarro,$modeloCarro,$anoModeloCarro,$anoFabricacaoCarro){
    $sql = ("INSERT  INTO carros(placa,renavam,marca,modelo,ano_modelo,ano_fabricado) VALUES (
            '$placaCarro', '$renavamCarro','$marcaCarro','$modeloCarro','$anoModeloCarro','$anoFabricacaoCarro')");

    conexaoBdInsert($sql);
}


function verificaFuncionarios($nomeFuncionario, $cpfFuncionario, $telefoneFuncionario, $idCargoFuncionario){
    if(isNome($nomeFuncionario)) {
        if(isCPF($cpfFuncionario)){
            if(isTelefone($telefoneFuncionario)){
                cadastraFuncionarios($nomeFuncionario, $cpfFuncionario, $telefoneFuncionario, $idCargoFuncionario);
            }else {
                $_SESSION['tipoErro'] = 'Telefone incorreto!';
                header('Location: cadastro-cliente.php?erro');
            }
        }else{
            $_SESSION['tipoErro'] = 'CPF incorreto!';
            header('Location: cadastro-cliente.php?erro');
        }
    }else{
            $_SESSION['tipoErro'] = 'Nome incorreto!';
            header('Location: cadastro-cliente.php?erro');
    }
}

function cadastraFuncionarios($nomeFuncionario, $cpfFuncionario, $telefoneFuncionario, $idCargoFuncionario){
    $sql = ("INSERT INTO funcionarios (matricula, nome, cpf, telefone_contato, cargos_id) VALUES (
            '$nomeFuncionario', '$cpfFuncionario', '$telefoneFuncionario', '$idCargoFuncionario')");

    conexaoBdInsert($sql);
}


function conexaoBdInsert($sql){
    global $connect;
    if(mysqli_query($connect, $sql)){
        $_SESSION['mensagem'] = "deu";
        header('Location: index.php?deu');
    }else{
        $_SESSION['mensagem'] = "erro";
        header('Location: cadastro-cliente.php?erro');
    }
}