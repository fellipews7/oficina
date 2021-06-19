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
        <h3 class="light">Editar Cliente</h3>

        <form action="phpaction/atualizar.php" method="post">

            <input type="hidden" name="nId" value="<?php echo $dados['id']?>">

            <div class="input-field col s12">
                <label for="iID">ID</label>
                <input type="text" name="nID" id="iID" value="<?php echo $dados['ID']?>">
            </div>

            <div class="input-field col s12">
                <label for="iNome">Nome</label>
                <input type="text" name="nNome" id="iNome" value="<?php echo $dados['nome']?>">
            </div>

            <div class="input-field col s12">
                <label for="iTelefone">Telefone</label>
                <input type="text" name="nTelefone" id="iTelefone" value="<?php echo $dados['telefone']?>">
            </div>

            <div class="input-field col s12">
                <label for="iCPF-CNPJ">CPF/CNPJ</label>
                <input type="text" name="nCPF-CNPJ" id="iCPF-CNPJ" value="<?php echo $dados['cpf_cnpj']?>">
            </div>

            <div class="input-field col s12">
                <label for="iEmail">Email</label>
                <input type="text" name="nEmail" id="iEmail" value="<?php echo $dados['email']?>">
            </div>

            <div class="input-field col s12">
                <label for="iDatNasc">Data Nascimento</label>
                <input type="text" name="nDatNasc" id="iDatNasc" value="<?php echo $dados['data_nascimento']?>">
            </div>

            <div class="input-field col s12">
                <label for="iEstado">Estado</label>
                <input type="text" name="nEstado" id="iEstado" value="<?php echo $dados['estado']?>">
            </div>

            <div class="input-field col s12">
                <label for="iMunicipio">Município</label>
                <input type="text" name="nMunicipio" id="iMunicipio" value="<?php echo $dados['municipio']?>">
            </div>

            <div class="input-field col s12">
                <label for="iEndereço">Endereço</label>
                <input type="text" name="nEndereço" id="iEndereço" value="<?php echo $dados['endereço']?>">
            </div>

            <button type="submit" name="btn-editar" class="btn black">Atualizar</button>
            <a href="index.php" class="btn black">Lista de clientes</a>
        </form>
    </div>
</div>

<?php
include_once 'includes/footer.php';
?>


