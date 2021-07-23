<?php
   

    if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }

    $_SESSION['login'] = 0;

    $login = $_POST["nLogin"];
    $senha = $_POST["nSenha"];
    $senha = md5($senha);

    include_once("../../App/connection.php");
    $sql = "SELECT * FROM funcionarios  WHERE login = '$login'  AND senha = '$senha';";
    $resultLogin = mysqli_query($connect,$sql);
    mysqli_close($connect);
    if (mysqli_num_rows($resultLogin) > 0) {
        $arrayLogin = array();
        
        while ($linha = mysqli_fetch_array($resultLogin, MYSQLI_ASSOC)) {
            array_push($arrayLogin,$linha);
        }
        
        foreach ($arrayLogin as $coluna) {
            
            $_SESSION['login'] = 1;
            header('location: ../../App/index.php');
            
        }        
    }else{

        $_SESSION['tipoErro'] = "Login Incorreto!";
        $_SESSION['mensagem'] = "erro";
        header('location: ../../index.php');
    } 

    

?>