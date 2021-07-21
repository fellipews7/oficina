<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (isset($_SESSION['login']) and $_SESSION['login'] == 1){

include_once '../connection.php';
include_once 'includes/header.php';
include_once '../assets/php/mensagem.php';


if(isset($_GET['id'])){
    $id = limpaVariavel($_GET['id']);

    $sql = "SELECT * FROM carros WHERE id = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
}
?>

<div class="row">
    <div class="col s12 m6 push-m3 ">
        <h3 class="light">Editar Carro</h3>

        <form action="phpaction/atualizar.php" method="post">

            <input type="hidden" name="nId" value="<?php echo $dados['id']?>">

            <div class="input-field col s12">
                <label for="iID">ID</label><br>
                <input type="text" readonly name="nID" id="iID" value="<?php echo $dados['id']?>">
            </div>

            <div class="input-field col s12">
                <label for="iPlaca">Placa</label><br>
                <input type="text" name="nPlaca" id="iPlaca" value="<?php echo $dados['placa']?>">
            </div>

            <div class="input-field col s12">
                <label for="iModelo">Modelo</label><br>
                <input type="text" name="nModelo" id="iModelo" value="<?php echo $dados['modelo']?>">
            </div>

            <div class="input-field col s12">
                <label for="iMarca">Marca</label><br>
                <input type="text" name="nMarca" id="iModelo" value="<?php echo $dados['marca']?>">
            </div>

            <div class="input-field col s12">
                <label for="iAnoMod">Ano Modelo</label><br>
                <input type="text" name="nAnoMod" id="iAnoMod" value="<?php echo $dados['ano_modelo']?>">
            </div>

            <div class="input-field col s12">
                <label for="iAnoFab">Ano Fabricação</label><br>
                <input type="text" name="nAnoFab" id="iAnoFab" value="<?php echo $dados['ano_fabricado']?>">
            </div>

            <div class="input-field col s12">
                <label for="iRenavam">Renavam</label><br>
                <input type="text" name="nRenavam" id="iRenavam" value="<?php echo $dados['renavam']?>">
            </div>

            <input type="hidden" name="nTipoAcao" value="2">

            <div class="center-align">
                <button type="submit" name="btn-editar-carro" class="btn black">Atualizar</button>
                <a href="../Consulta-Carros.php" class="btn black">Lista de carros</a>
            </div>
        </form>
    </div>
</div>

<?php
include_once 'includes/footer.php';
} else {
    header('location: ../../index.php');
    $_SESSION['tipoErro'] = 'Por favor faça login!';
    $_SESSION['mensagem'] = 'erro';
}


