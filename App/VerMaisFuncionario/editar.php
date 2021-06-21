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
        <h3 class="light">Editar Funcionário</h3>

        <form action="phpaction/atualizar.php" method="post">

            <input type="hidden" name="nId" value="<?php echo $dados['id']?>">

            <div class="input-field col s12">
                <label for="iMatricula">Matrícula</label>
                <input type="text" name="nMatricula" id="iMatricula" value="<?php echo $dados['nome']?>">
            </div>

            <div class="input-field col s12">
                <label for="iCargo">Cargo</label>
                <input type="text" name="nCargo" id="iCargo" value="<?php echo $dados['nome']?>">
            </div>

            <div class="input-field col s12">
                <label for="iNome">Nome</label>
                <input type="text" name="nNome" id="iNome" value="<?php echo $dados['nome']?>">
            </div>

            <div class="input-field col s12">
                <label for="iTelefone">Telefone</label>
                <input type="text" name="nTelefone" id="iTelefone" value="<?php echo $dados['nome']?>">
            </div>

            <button type="submit" name="btn-editar" class="btn black">Atualizar</button>
            <a href="index.php" class="btn black">Lista de funcionários</a>
        </form>
    </div>
</div>

<?php
include_once 'includes/footer.php';
?>


