<?php
require_once '../dompdf/autoload.inc.php';
include_once '../connection.php';
$dados=0;
function limpaVariavel($value){

    global $connect;
    $value = mysqli_escape_string($connect, $value);
    $value = htmlspecialchars($value);

    return $value;
}
$dompdf = new \Dompdf\Dompdf();
if(isset($_GET['id'])) {
    $id = limpaVariavel($_GET['id']);
    $sql = "SELECT so.id AS so_id, so.orcamentos_id AS orc_id, cl.nome AS cl_nome, ca.modelo AS ca_modelo, so.km_atual AS so_km_atual,
                          so.data_cadastro AS so_data_cadastro, so.data_previsao AS so_data_previsao, so.data_conclusao AS so_data_conclusao,
                          func.nome AS func_nome, so.status AS status, so.valor_final AS so_valor_final, cl.telefone AS cl_telefone,
                          cl.logradouro AS cl_logradouro, cl.numero_logradouro AS cl_numero_logradouro,
                          orc.
                          cl.bairro AS cl_bairro, cl.cpf AS cl_cpf, cl.cnpj AS cl_cnpj
                          FROM orcamentos AS orc 
                          INNER JOIN ordens_de_servicos AS so ON so.orcamentos_id = orc.id 
                          INNER JOIN clientes AS cl ON orc.clientes_id = cl.id 
                          INNER JOIN funcionarios AS func ON so.funcionarios_matricula = func.matricula 
                          INNER JOIN carros AS ca ON orc.carros_id = ca.id
                          WHERE so.id = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados1 = mysqli_fetch_array($resultado);

    $dompdf->loadHtml('<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="assets/css/ImprimirOS.css" rel="stylesheet" />

    <title>Mecanica Schulz</title>
    </head>

    <body>
        <form>
            <table rules=all style="font-size: 20px;">

                <thead style="background: gray">
                    <tr>
                        <th colspan="2"><h3>Mecanica Schulz</h3></th>
                        <th colspan="1" style="background: white">Nº OS: ' . $dados1["so_id"] .'</th>
                        <th colspan="1" style="background: white">Nº Orçamento: ' . $dados1["orc_id"] .'</th>
                    </tr>
                </thead>

                <tr>
                    <td colspan="2">Empresa: Oficina Schulz</td>
                    <td colspan="2">Telefone: </td>
                </tr>

                <tr>
                    <td colspan="2">Endereço: </td>
                    <td colspan="2">CNPJ: </td>
                </tr>

                <tr>
                    <td colspan="2">Data Cadastro: ' . $dados1["so_data_cadastro"] .'</td>
                    <td colspan="2">Data Prevista: ' . $dados1["so_data_previsao"] .'</td>
                </tr>

                <tr>
                    <td colspan="2">Data Entrega: ' . $dados1["so_data_conclusao"] .'</td>
                    <td colspan="2">Funcionário: ' . $dados1["func_nome"] .'</td>
                </tr>

                <tr>
                    <td colspan="2">Status: ' . $dados1["status"] .'</td>
                    <td colspan="2">Valor total: ' . $dados1["so_valor_final"] .'</td>
                </tr>

                <thead style="background: gray">
                    <tr><th colspan="4"><h3>Cliente</h3></th></tr>
                </thead>

                <tr>
                    <td colspan="2">Nome: ' . $dados1["cl_nome"] .'</td>
                    <td colspan="2">Telefone: ' . $dados1["cl_telefone"] .'</td>
                </tr>

                <tr>
                    <td colspan="2">Endereço: ' . $dados1["cl_logradouro"] . ',' . $dados1["cl_numero_logradouro"] . ',' . $dados1['cl_bairro'] .'</td>
                    <td colspan="2">CPF/CNPJ: ' . $dados1["cl_cpf"] . ',' . $dados1['cl_cnpj'] . '</td>
                </tr>

                <tr>
                    <td colspan="2">Carro: ' . $dados1["ca_modelo"] .'</td>
                    <td colspan="2">Quilometragem: ' . $dados1["so_km_atual"] .'</td>
                </tr>

                <thead style="background: gray">
                    <tr><th colspan="4"><h3>Serviço</h3></th></tr>
                </thead>
                <tr>
                    <td colspan="2">Problema: ' . $dados1["ca_modelo"] .'</td>
                    <td colspan="2">Tipo de Manutenção: ' . $dados1["ca_modelo"] .'</td>
                </tr>

                <tr>
                    <td colspan="2">Serviço Feito: </td>
                    <td colspan="2">Valor do Serviço Feito: ' . $dados1["ca_modelo"] .'</td>
                </tr>

                <tr>
                    <td colspan="2">Descrição de produtos: ' . $dados1["ca_modelo"] .'</td>
                    <td colspan="2">Valor dos Produtos: ' . $dados1["ca_modelo"] .'</td>
                </tr>

                <tfoot style="background: gray">
                    <tr>
                        <td colspan="4">Ass. Cliente: </td>
                    </tr>
                    <tr>
                        <td colspan="4">Ass. Empresa: </td>
                    </tr>
                </tfoot>
            </table>
        </form>
        <footer>
            <p>&copy; Developed by Igária ltda</p>
        </footer>
    </body>
</html>
');

}
$dompdf->render();

$dompdf->stream(
        "OrdemDeServico".$dados[''].".pdf",
    array(
        "Attachment" => false
    )
);



?>
