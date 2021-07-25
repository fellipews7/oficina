<?php
include_once '../../connection.php';
$id = $_GET['id'];

$sql2 = ("UPDATE ordens_de_servicos SET status='2' WHERE id='$id'");

if(mysqli_query($connect, $sql2)){
    $_SESSION['mensagem'] = "deu";
    $_SESSION['tipoErro'] = "OS concluída com sucesso!";
    header('Location: ../../index.php');

}else{
    $_SESSION['mensagem'] = "erro";
    $_SESSION['tipoErro'] = "Erro ao concluir OS!";
    header('Location: ../OS.php?id='.$id);

}


