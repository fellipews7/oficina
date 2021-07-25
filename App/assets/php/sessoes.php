<?php

function setSessaoClientes(){
    $_SESSION['nomeCliente']                  = ($_POST['nNomeCliente']);
    $_SESSION['telefoneCliente']              = ($_POST['nTelefoneCliente']);
    $_SESSION['dataNascimentoCliente']        = ($_POST['nDataNascCliente']);
    $_SESSION['tipoAcao']                     = ($_POST['nTipoAcao']);
    $_SESSION['emailCliente']                 = ($_POST['nEmailCliente']);
    $_SESSION['municipioLogradouroCliente']   = ($_POST['nMunicipioCliente']);
    $_SESSION['numeroLogradouroCliente']      = ($_POST['nNumeroCliente']);
    $_SESSION['estadoLogradouroCliente']      = ($_POST['nEstadoCliente']);
    $_SESSION['logradouroCliente']            = ($_POST['nRuaCliente']);
    $_SESSION['cepLogradouroCliente']         = ($_POST['nCEPCliente']);
    $_SESSION['bairroLogradouroCliente']      = ($_POST['nBairroCliente']);
    $_SESSION['complementoLogradouroCliente'] = ($_POST['nComplementoCliente']);

    if ($_POST['nCpfCliente'] = "") {
        $_SESSION['cpfCnpjCliente'] = $_POST['nCnpjCliente'];
    }else{
        $_SESSION['cpfCnpjCliente'] = $_POST['nCpfCliente'];
    }
}


function unsetSessaoClientes(){

    $_SESSION['tipoAcao']                     = null;
    $_SESSION['nomeCliente']                  = null;
    $_SESSION['telefoneCliente']              = null;
    $_SESSION['dataNascimentoCliente']        = null;
    $_SESSION['cpfCnpjCliente']               = null;
    $_SESSION['emailCliente']                 = null;
    $_SESSION['municipioLogradouroCliente']   = null;
    $_SESSION['numeroLogradouroCliente']      = null;
    $_SESSION['estadoLogradouroCliente']      = null;
    $_SESSION['logradouroCliente']            = null;
    $_SESSION['cepLogradouroCliente']         = null;
    $_SESSION['bairroLogradouroCliente']      = null;
    $_SESSION['idCliente']                    = null;
    $_SESSION['tipoCadastroCliente']          = null;
    $_SESSION['complementoLogradouroCliente'] = null;
    $_SESSION['setSessionCliente']            = false;

}

function setSessaoFunc(){
    $_SESSION['tipoAcao']     =  ($_POST['nTipoAcao']);
    $_SESSION['nomeFunc']     =  ($_POST['nNomeFuncionario']);
    $_SESSION['cpfFunc']      =  ($_POST['nCPFFuncionario']);
    $_SESSION['telefoneFunc'] =  ($_POST['nTelefoneFuncionario']);
    $_SESSION['cargoFunc']    =  ($_POST['nIDCargoFuncionarios']);
    $_SESSION['loginFunc']    =  ('1');
    $_SESSION['senhaFunc']    =  ('1');
    $_SESSION['setSessionFunc'] = true;
}

function unsetSessaoFunc(){
    $_SESSION['tipoAcao']       = null;
    $_SESSION['nomeFunc']       = null;
    $_SESSION['cpfFunc']        = null;
    $_SESSION['telefoneFunc']   = null;
    $_SESSION['cargoFunc']      = null;
    $_SESSION['loginFunc']      = null;
    $_SESSION['senhaFunc']      = null;
    $_SESSION['setSessionFunc'] = false;
}

function setSessaoCarros(){
    $_SESSION['tipoAcao']            = ($_POST['nTipoAcao']);
    $_SESSION['setSessionCarros']    = true;
    $_SESSION['placaCarros']         = ($_POST['nPlacaCarro']);
    $_SESSION['modeloCarros']        = ($_POST['nModeloCarro']);
    $_SESSION['marcaCarros']         = ($_POST['nMarcaCarro']);
    $_SESSION['renavamCarros']       = ($_POST['nRenavamCarro']);
    $_SESSION['anoModeloCarros']     = ($_POST['nAnodoModeloCarro']);
    $_SESSION['anoFabricacaoCarros'] = ($_POST['nAnoFabricacaoCarro']);

}

function unsetSessaoCarros(){
    $_SESSION['placaCarros']         = null;
    $_SESSION['modeloCarros']        = null;
    $_SESSION['marcaCarros']         = null;
    $_SESSION['renavamCarros']       = null;
    $_SESSION['anoModeloCarros']     = null;
    $_SESSION['anoFabricacaoCarros'] = null;
}

function setPesqCliente() {
    $_SESSION['setSessaoPesquisaCliente']    = true;
    $_SESSION['palavraChave']                = ($_POST['nPalavraChaveClienteCon']);
}

function unsetPesqCliente() {
    $_SESSION['palavraChave']   = null;
}

function unsetSessoes(){
    unsetSessaoFunc();
    unsetSessaoClientes();
    unsetSessaoCarros();
}
