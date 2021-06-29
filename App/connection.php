<?php
$servername = "localhost";
$username = "root";
$password = "";
$bd_name = "bd_mecanica";

$connect = new mysqli($servername, $username, $password, $bd_name);
mysqli_set_charset($connect, "utf-8");

if($connect->connect_error){
    die("Connection failed : ". $connect->connect_error);
}