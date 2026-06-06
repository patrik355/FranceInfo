<!DOCTYPE html>
<html lang="hr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registracija</title>
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

<h1>Registracija korisnika</h1>
<?php
if(isset($_GET['greska']))
{
    if($_GET['greska'] == 'lozinka')
    {
?>
<div class="error-message">
    Lozinke se ne podudaraju.
</div>
<?php
    }

    if($_GET['greska'] == 'korisnik')
    {
?>
<div class="error-message">
    Korisničko ime već postoji.
</div>
<?php
    }
}
?>
<form action="registracija_skripta.php" method="POST" class="login-form"
>

<label>Ime</label>
<input
    type="text"
    name="ime"
    value="<?php echo $_GET['ime'] ?? ''; ?>"
    required
>

<label>Prezime</label>
<input
    type="text"
    name="prezime"
    value="<?php echo $_GET['prezime'] ?? ''; ?>"
    required
>

<label>Korisničko ime</label>
<input
    type="text"
    name="korisnicko_ime"
    value="<?php echo $_GET['korisnicko_ime'] ?? ''; ?>"
    required
>

<label>Lozinka</label>
<input type="password" name="lozinka" required>

<label>Ponovi lozinku</label>
<input type="password" name="lozinka2" required>

<button class="login-button" type="submit">
Registriraj se
</button>
<div class="register-link">
    Već imate račun?
    <a href="login.php">Prijavite se</a>
</div>

</form>

</main>

<footer>
<p>france.tv</p>
</footer>

</body>
</html>