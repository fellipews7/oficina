<?php
include_once 'phpaction/db_connect.php';
include_once 'includes/header.php';
require_once 'phpaction/db_connect.php';
include_once 'includes/funcao.php';

if(isset($_GET['id'])){
    $id = clear($_GET['id']);

    $sql = "SELECT * FROM clientes WHERE id = '$id'";
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
                <label for="iID">ID</label>
                <input type="text" name="nID" id="iID" value="<?php echo $dados['ID']?>">
            </div>

            <div class="input-field col s12">
                <label for="iPlaca">Placa</label>
                <input type="text" name="nPlaca" id="iPlaca" value="<?php echo $dados['placa']?>">
            </div>

            <div class="input-field col s12">
                <label for="iModelo">Modelo</label>
                <input type="text" name="nModelo" id="iModelo" value="<?php echo $dados['modelo']?>">
            </div>

            <div class="input-field col s12">
                <label for="iAnoMod">Ano Modelo</label>
                <input type="text" name="nAnoMod" id="iAnoMod" value="<?php echo $dados['anomodelo']?>">
            </div>

            <div class="input-field col s12">
                <label for="iAnoFab">Ano Fabricação</label>
                <input type="text" name="nAnoFab" id="iAnoFab" value="<?php echo $dados['anofabricação']?>">
            </div>

            <div class="input-field col s12">
                <label for="iCliAtual">Cliente Atual</label>
                <input type="text" name="nCliAtual" id="iCliAtual" value="<?php echo $dados['clienteatual']?>">
            </div>

            <button type="submit" name="btn-editar" class="btn black">Atualizar</button>
            <a href="index.php" class="btn black">Lista de carros</a>
        </form>
    </div>
</div>

<?php
include_once 'includes/footer.php';
?>


