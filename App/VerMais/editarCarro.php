<?php
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
<<<<<<< HEAD

                <label for="iID">Código do Carro</label><br>
                <input type="text" name="nID" id="iID" value="<?php echo $dados['id']?>">

=======
                <label for="iID">ID</label>
                <input type="text" readonly name="nID" id="iID" value="<?php echo $dados['id']?>">
>>>>>>> 8f214bacd85793b16f875694e3029226cb5a012a
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
                <label for="iMarca">Marca</label>
                <input type="text" name="nMarca" id="iModelo" value="<?php echo $dados['marca']?>">
            </div>

            <div class="input-field col s12">
                <label for="iAnoMod">Ano Modelo</label>
                <input type="text" name="nAnoMod" id="iAnoMod" value="<?php echo $dados['ano_modelo']?>">
            </div>

            <div class="input-field col s12">
                <label for="iAnoFab">Ano Fabricação</label>
                <input type="text" name="nAnoFab" id="iAnoFab" value="<?php echo $dados['ano_fabricado']?>">
            </div>

            <div class="input-field col s12">
                <label for="iRenavam">Renavam</label>
                <input type="text" name="nRenavam" id="iRenavam" value="<?php echo $dados['renavam']?>">
            </div>

            <input type="hidden" name="nTipoAcao" value="2">

            <button type="submit" name="btn-editar-carro" class="btn black">Atualizar</button>
            <a href="../Consulta-Carros.php" class="btn black">Lista de carros</a>
        </form>
    </div>
</div>

<?php
include_once 'includes/footer.php';
?>


