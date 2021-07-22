<?php
require_once 'dompdf/autoload.inc.php';
$dados=0;
$dompdf = new \Dompdf\Dompdf();

<<<<<<< HEAD
=======

>>>>>>> parent of de34d2c... merge
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
<<<<<<< HEAD
            <table rules=all style="font-size: 18px;">
=======
            <table rules=all style="font-size: 20px;">
>>>>>>> parent of de34d2c... merge

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
                    <td colspan="2">Problema: </td>
                    <td colspan="2">Tipo de Manutenção: </td>
                </tr>

                <tr>
                    <td colspan="2">Serviço Feito: </td>
                    <td colspan="2">Valor do Serviço Feito: </td>
                </tr>

                <tr>
                    <td colspan="2">Produtos Usados/Comprados: </td>
                    <td colspan="2">Valor dos Produtos Usados/Comprados: </td>
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
