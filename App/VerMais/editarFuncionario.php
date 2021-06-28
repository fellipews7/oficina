<?php
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
<<<<<<< HEAD

                <label for="iMatricula">Matrícula</label><br>
                <input type="text" name="nMatricula" id="iMatricula" value="<?php echo $dados['matricula']?>">

=======
                <label for="iMatricula">Matrícula</label>
                <input type="text" readonly name="nMatricula" id="iMatricula" value="<?php echo $dados['matricula']?>">
>>>>>>> 8f214bacd85793b16f875694e3029226cb5a012a
            </div>

            <div class="input-field col s12">
                <label for="iCargo">Id Cargo</label>
                <input type="text" name="nCargo" id="iCargo" value="<?php echo $dados['cargos_id']?>">
            </div>

            <div class="input-field col s12">
                <label for="iNome">Nome</label>
                <input type="text" name="nNome" id="iNome" value="<?php echo $dados['nome']?>">
            </div>

            <div class="input-field col s12">
                <label for="iCpf">CPF</label>
                <input type="text" name="nCpf" id="iCpf" value="<?php echo $dados['cpf']?>">
            </div>

            <div class="input-field col s12">
                <label for="iTelefone">Telefone</label>
                <input type="text" name="nTelefone" id="iTelefone" value="<?php echo $dados['telefone_contato']?>">
            </div>

            <div class="input-field col s12">
                <label for="iLogin">Login</label>
                <input type="text" name="nLogin" id="iLogin" value="<?php echo $dados['login']?>">
            </div>

            <div class="input-field col s12">
                <label for="iSenha">Senha</label>
                <input type="password" name="nSenha" id="iSenha" value="<?php echo $dados['senha']?>">
            </div>

            <input type="hidden" name="nTipoAcao" value="2">

            <button type="submit" name="btn-editar-funcionario" class="btn black">Atualizar</button>
            <a href="funcionario.php" class="btn black">Lista de funcionários</a>
        </form>
    </div>
</div>

<?php
include_once 'includes/footer.php';
?>


