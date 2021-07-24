<?php


if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (isset($_SESSION['login']) and $_SESSION['login'] == 1){

include_once '../connection.php';
include_once 'includes/header.php';


if(isset($_GET['matricula'])){
    $matricula = limpaVariavel($_GET['matricula']);

    $sql = "SELECT * FROM funcionarios WHERE matricula = '$matricula'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
}
?>

<div class="row">
    <div class="col s12 m6 push-m3 ">
        <h3 class="light">Editar Funcionário</h3>

        <form action="phpaction/atualizar.php" method="post">

            <input type="hidden" name="nMatricula" value="<?php echo $dados['matricula']?>">

            <div class="input-field col s12">

                <label for="iMatricula">Matrícula</label><br>
                <input type="text" readonly name="nMatricula" id="iMatricula" value="<?php echo $dados['matricula']?>">

            </div>

            <div class="input-field col s12">
                <label for="iCargo">Id Cargo</label><br>
                <input type="text" name="nCargo" id="iCargo" value="<?php echo $dados['cargos_id']?>">
            </div>

            <div class="input-field col s12">
                <label for="iNome">Nome</label><br>
                <input type="text" name="nNome" id="iNome" value="<?php echo $dados['nome']?>">
            </div>

            <div class="input-field col s12">
                <label for="iCpf">CPF</label><br>
                <input type="text" name="nCpf" id="iCpf" value="<?php echo $dados['cpf']?>">
            </div>

            <div class="input-field col s12">
                <label for="iTelefone">Telefone</label><br>
                <input type="text" name="nTelefone" id="iTelefone" value="<?php echo $dados['telefone_contato']?>">
            </div>

            <div class="input-field col s12"><br>
                <label for="iLogin">Login</label>
                <input type="text" name="nLogin" id="iLogin" value="<?php echo $dados['login']?>">
            </div>

            <div class="input-field col s12"><br>
                <label for="iSenha">Senha</label>
                <input type="password" name="nSenha" id="iSenha" value="<?php echo $dados['senha']?>">
            </div>

            <input type="hidden" name="nTipoAcao" value="2">

            <div class="center-align">
                <button type="submit" name="btn-editar-funcionario" class="btn black">Atualizar</button>
                <a href="../Consulta-Funcionarios.php" class="btn black">Lista de funcionários</a>
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


