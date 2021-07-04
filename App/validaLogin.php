<?php
   

    if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }

    $_SESSION['logado'] = 0;

    $login = $_POST["nLogin"];
    $senha = $_POST["nSenha"];

    //$_POST - Valor enviado pelo FORM através da propriedade NAME do elemento HTML 
    //$_GET - Valor enviado pelo FORM através da URL
    //$_SESSION - Variável criada pelo usuário no PHP

    include("connection.php");
    $sql = "SELECT * FROM funcionarios  WHERE login = '$login'  AND senha = '$senha';";
    $resultLogin = mysqli_query($connect,$sql);
    mysqli_close($connect);

    //Validar se tem retorno do BD
    if (mysqli_num_rows($resultLogin) > 0) {
        
        $arrayLogin = array();
        
        while ($linha = mysqli_fetch_array($resultLogin, MYSQLI_ASSOC)) {
            array_push($arrayLogin,$linha);
        }
        
        foreach ($arrayLogin as $coluna) {
            
            //***Verificar os dados da consulta SQL
            //$_SESSION['idTipoUsuario'] = $coluna['idTipoUsuario'];
            $_SESSION['logado'] = 1;
    
            //Acessar a tela inicial
            // comentada nathan 30/06/21
            header('location: index.php');
            
        }        
    }else{
        //Acessar a tela inicial
 
        // comentada nathan 30/06/21
        $_SESSION['tipoErro'] = "Login Incorreto";
        $_SESSION['mensagem'] = "erro";
        header('location: ../index.php');
    } 

    

?>