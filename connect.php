<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "franceinfo";

$conn = mysqli_connect(
    $servername,
    $username,
    $password,
    $dbname
);

if(!$conn)
{
    die("Greška kod spajanja na bazu!");
}

mysqli_set_charset($conn, "utf8");
?>