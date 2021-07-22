<?php
<<<<<<< HEAD
require_once 'dompdf/autoload.inc.php';
=======
require_once '../dompdf/autoload.inc.php';
include_once '../connection.php';
>>>>>>> parent of de34d2c... merge
$dados=0;
$dompdf = new \Dompdf\Dompdf();
<<<<<<< HEAD

$dompdf->loadHtml('<html xmlns="http://www.w3.org/1999/xhtml">
=======
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
>>>>>>> parent of de34d2c... merge

    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../assets/css/ImprimirOS.css" rel="stylesheet" />

    <title>Mecanica Schulz</title>
    </head>

    <body>
        <form>
            <table rules=all style="font-size: 18px;">

                <thead style="background: gray">
                    <tr>
                        <th colspan="2"><h3>Mecanica Schulz</h3></th>
                        <th colspan="1" style="background: white">Nº OS: </th>
                        <th colspan="1" style="background: white">Nº Orçamento: </th>
                    </tr>
                </thead>

                <tr>
                    <td colspan="2">Empresa: </td>
                    <td colspan="2">Telefone: </td>
                </tr>

                <tr>
                    <td colspan="2">Endereço: </td>
                    <td colspan="2">CPF/CNPJ: </td>
                </tr>

                <tr>
                    <td colspan="2">Data Cadastro: </td>
                    <td colspan="2">Data Prevista: </td>
                </tr>

                <tr>
                    <td colspan="2">Data Entrega: </td>
                    <td colspan="2">Funcionário: </td>
                </tr>

                <tr>
                    <td colspan="2">Status: </td>
                    <td colspan="2">Valor total: </td>
                </tr>

                <thead style="background: gray">
                    <tr><th colspan="4"><h3>Cliente</h3></th></tr>
                </thead>

                <tr>
                    <td colspan="2">Nome: </td>
                    <td colspan="2">Telefone: </td>
                </tr>

                <tr>
                    <td colspan="2">Endereço: </td>
                    <td colspan="2">CPF/CNPJ: </td>
                </tr>

                <tr>
                    <td colspan="2">Carro: </td>
                    <td colspan="2">Quilometragem: </td>
                </tr>

                <thead style="background: gray">
                    <tr><th colspan="4"><h3>Serviço</h3></th></tr>
                </thead>
                <tr>
<<<<<<< HEAD
                    <td colspan="2">Problema: </td>
                    <td colspan="2">Tipo de Manutenção: </td>
=======
                    <td colspan="2">Problema: ' . $dados1["ca_modelo"] .'</td>
                    <td colspan="2">Tipo de Manutenção: ' . $dados1["ca_modelo"] .'</td>
>>>>>>> parent of de34d2c... merge
                </tr>

                <tr>
                    <td colspan="2">Serviço Feito: </td>
<<<<<<< HEAD
                    <td colspan="2">Valor do Serviço Feito: </td>
                </tr>

                <tr>
                    <td colspan="2">Produtos Usados/Comprados: </td>
                    <td colspan="2">Valor dos Produtos Usados/Comprados: </td>
=======
                    <td colspan="2">Valor do Serviço Feito: ' . $dados1["ca_modelo"] .'</td>
                </tr>

                <tr>
                    <td colspan="2">Descrição de produtos: ' . $dados1["ca_modelo"] .'</td>
                    <td colspan="2">Valor dos Produtos: ' . $dados1["ca_modelo"] .'</td>
>>>>>>> parent of de34d2c... merge
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

$dompdf->render();

$dompdf->stream(
        "OrdemDeServico".$dados[''].".pdf",
    array(
        "Attachment" => false
    )
);



?>
