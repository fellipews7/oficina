
<?php
include_once 'connection.php';
$dataConta = 0;
$mesTeste = 0;
$mesAtual = date('m');
$mesConta = 0;
$mesNome[] = "";
$qtdOs[] = 0;
$qtdOrc[] = 0;
$orcRejeitado[] = 0;
$contador1 = 0;
$contador2 = 0;
do{
    $mesConta = $mesAtual - $mesTeste;
    if ($mesConta == 12){
        $dataContaIni =  (date('y')) . "/" . $mesConta . "/" . 1;
        $dataContaFim = (idate('y')) + 1 . "/" . 1 . "/" . 1;
    }else{
        $dataContaIni =  (date('y')) . "/" . $mesConta . "/" . 1;
        $dataContaFim = (date('y')) . "/" . ($mesConta + 1) . "/" . 1;
    }

    $sql = "SELECT COUNT(*) as contador FROM ordens_de_servicos WHERE data_conclusao BETWEEN '$dataContaIni' AND '$dataContaFim'";
    $resultado = mysqli_query($connect, $sql);
    while ($dados = mysqli_fetch_array($resultado)){
        $qtdOs[$mesTeste] = $dados['contador'];

    }

    if(isset($qtdOs[$mesTeste])){

    }else{
        $qtdOs[$mesTeste] = 0;
    }


    $sql = "SELECT COUNT(*) as contador1 FROM orcamentos WHERE data BETWEEN '$dataContaIni' AND '$dataContaFim'";
    $resultado1 = mysqli_query($connect, $sql);
    while ($dados1 = mysqli_fetch_array($resultado1)){
        $qtdOrc[$mesTeste] = $dados1['contador1'];
    }

    if(isset($qtdOrc[$mesTeste])){

    }else{
        $qtdOrc[$mesTeste] =  0;
    }

    $sql = "SELECT COUNT(*) as status FROM orcamentos WHERE status = 2 AND data BETWEEN '$dataContaIni' AND '$dataContaFim' ";
    $resultado2 = mysqli_query($connect, $sql);
    while ($dados2 = mysqli_fetch_array($resultado2)){
        $orcRejeitado[$mesTeste] = $dados2['status'];
    }

    if(isset($orcRejeitado[$mesTeste])){

    }else{
        $orcRejeitado[$mesTeste] =  0;
    }

    $mesNome[$mesTeste] = nomeMes($mesConta);

    $mesTeste++;

}while($mesTeste < 6);

function nomeMes($mesTeste){
    if($mesTeste == 1){
        $mesNome = "Jan";
    }
    elseif ($mesTeste == 2){
        $mesNome = "Fev";
    }
    elseif ($mesTeste == 3){
        $mesNome = "Mar";
    }
    elseif ($mesTeste == 4){
        $mesNome = "Abr";
    }
    elseif ($mesTeste == 5){
        $mesNome = "Mai";
    }
    elseif ($mesTeste == 6){
        $mesNome = "Jun";
    }
    elseif ($mesTeste == 7){
        $mesNome = "Jul";
    }
    elseif ($mesTeste == 8){
        $mesNome = "Ago";
    }
    elseif ($mesTeste == 9){
        $mesNome = "Set";
    }
    elseif ($mesTeste == 10){
        $mesNome = "Out";
    }
    elseif ($mesTeste == 11){
        $mesNome = "Nov";
    }
    elseif ($mesTeste == 12){
        $mesNome = "Dez";
    }

    return $mesNome;
}
?>

