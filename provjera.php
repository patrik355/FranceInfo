<?php

session_start();

include 'connect.php';

$korisnicko_ime = $_POST['korisnicko_ime'];
$lozinka = $_POST['lozinka'];

$stmt = mysqli_prepare(
    $conn,
    "SELECT * FROM korisnik
     WHERE korisnicko_ime=?"
);

mysqli_stmt_bind_param(
    $stmt,
    "s",
    $korisnicko_ime
);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($result) == 1)
{
    $row = mysqli_fetch_assoc($result);

    if(password_verify($lozinka, $row['lozinka']))
    {
        $_SESSION['korisnicko_ime'] =
            $row['korisnicko_ime'];

        $_SESSION['razina'] =
            $row['razina'];

        header("Location: administrator.php");
    }
    else
    {
        header("Location: login.php?greska=1");
    }
}
else
{
    header("Location: login.php?greska=1");
}

exit();

?>