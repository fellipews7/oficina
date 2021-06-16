<?php
require_once 'db_connect.php';
include_once '../includes/funcao.php';

session_start();

if(isset($_POST['btn-editar'])){
    $nome = clear($_POST['nNome']);
    $sobrenome = clear($_POST['nSobrenome']);
    $email = clear($_POST['nEmail']);
    $idade = clear($_POST['nIdade']);

    $id = mysqli_escape_string($connect, $_POST['nId']);

    $sql = "UPDATE clientes SET nome = '$nome', sobrenome = '$sobrenome', email = '$email', idade = '$idade' WHERE id = '$id'";

    if(mysqli_query($connect, $sql)){
        $_SESSION['mensagem'] = "Atualizado com sucesso!";
        header('Location: ../index.php');
    }else{
        $_SESSION['mensagem'] = "Erro ao atualizar!";
        header('Location: ../index.php');
    }
}

