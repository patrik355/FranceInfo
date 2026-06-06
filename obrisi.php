<?php
include 'connect.php';
$id = $_GET['id'];
$sql = "DELETE FROM vijesti WHERE id=$id";
mysqli_query($conn,$sql);
header("Location: administrator.php");
?>