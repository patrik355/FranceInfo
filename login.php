<?php
session_start();

if(isset($_SESSION['korisnicko_ime']))
{
    header("Location: administrator.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Prijava</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>

<header>
    <div class="logo">
        franceinfo<span>:</span>
    </div>
</header>

<nav>
    <ul>
        <li><a href="index.php">home</a></li>
        <li><a href="kategorija.php?kategorija=elections">elections</a></li>
        <li><a href="kategorija.php?kategorija=lesjt">les jt</a></li>
        <li><a href="vrijeme.php">vrijeme</a></li>
        <li><a href="login.php">administracija</a></li>
    </ul>
</nav>

<main class="login-container">

    <h1>Prijava korisnika</h1>
    <?php
    if(isset($_GET['greska']))
    {
    ?>
        <div class="error-message">
            Neispravno korisničko ime ili lozinka.
        </div>
    <?php
    }
    if(isset($_GET['registracija']))
    {
    ?>
    <div class="success-message">
        Račun je uspješno kreiran. Možete se prijaviti.
    </div>
    <?php
    }
    ?>
    <form action="provjera.php" method="POST" class="login-form">

        <label>Korisničko ime</label>
        <input type="text" name="korisnicko_ime" required>

        <label>Lozinka</label>
        <input type="password" name="lozinka" required>

        <button type="submit" class="login-button">
            Prijavi se
        </button>

    </form>

    <div class="register-link">
        Nemate račun?
        <a href="registracija.php">Registrirajte se</a>
    </div>

</main>

<footer>
<p>france.tv</p>
</footer>

</body>
</html>