<?php

include 'connect.php';

$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$korisnicko_ime = $_POST['korisnicko_ime'];
$lozinka = $_POST['lozinka'];
$lozinka2 = $_POST['lozinka2'];

if($lozinka != $lozinka2)
{
    header(
        "Location: registracija.php?greska=lozinka"
        . "&ime=" . urlencode($ime)
        . "&prezime=" . urlencode($prezime)
        . "&korisnicko_ime=" . urlencode($korisnicko_ime)
    );
    exit();
}

$stmt = mysqli_prepare(
    $conn,
    "SELECT id
     FROM korisnik
     WHERE korisnicko_ime=?"
);

mysqli_stmt_bind_param(
    $stmt,
    "s",
    $korisnicko_ime
);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($result) > 0)
{
    header(
        "Location: registracija.php?greska=korisnik"
        . "&ime=" . urlencode($ime)
        . "&prezime=" . urlencode($prezime)
    );
    exit();
}

$hashirana_lozinka = password_hash(
    $lozinka,
    PASSWORD_DEFAULT
);

$sql = "SELECT *
        FROM korisnik
        WHERE korisnicko_ime='$korisnicko_ime'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0)
{
    header(
        "Location: registracija.php?greska=korisnik"
        . "&ime=" . urlencode($ime)
        . "&prezime=" . urlencode($prezime)
    );
    exit();
}

$stmt = mysqli_prepare(
    $conn,
    "INSERT INTO korisnik
    (
        ime,
        prezime,
        korisnicko_ime,
        lozinka,
        razina
    )
    VALUES
    (?, ?, ?, ?, 0)"
);

mysqli_stmt_bind_param(
    $stmt,
    "ssss",
    $ime,
    $prezime,
    $korisnicko_ime,
    $hashirana_lozinka
);

mysqli_stmt_execute($stmt);

header("Location: login.php?registracija=1");

exit();

?>