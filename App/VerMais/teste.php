$dompdf->loadHtml('<html xmlns="http://www.w3.org/1999/xhtml">

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
            <td colspan="2">Funcionário:  ' . $dados1["func_nome"] .'</td>
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