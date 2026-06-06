<?php
include 'connect.php';

$id = $_POST['id'];
$naslov = $_POST['naslov'];
$sazetak = $_POST['sazetak'];
$tekst = $_POST['tekst'];
$naslov = mysqli_real_escape_string($conn, $naslov);
$sazetak = mysqli_real_escape_string($conn, $sazetak);
$tekst = mysqli_real_escape_string($conn, $tekst);

$sql = "UPDATE vijesti SET
        naslov='$naslov',
        sazetak='$sazetak',
        tekst='$tekst'
        WHERE id=$id";

mysqli_query($conn, $sql);

if($_FILES['slika']['name'] != "")
{
    $slika = $_FILES['slika']['name'];

    move_uploaded_file(
        $_FILES['slika']['tmp_name'],
        "slike/".$slika
    );

    $sql = "UPDATE vijesti
            SET slika='$slika'
            WHERE id=$id";

    mysqli_query($conn, $sql);
}

header("Location: administrator.php");

exit();

?>