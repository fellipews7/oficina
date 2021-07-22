<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link rel="stylesheet" href="./assets/css/general.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Consulta</title>
</head>

<body>
<?php
function limpaVariavel($value){

    global $connect;
    $value = mysqli_escape_string($connect, $value);
    $value = htmlspecialchars($value);

    return $value;
}
?>
