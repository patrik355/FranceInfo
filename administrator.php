<?php

session_start();

if(!isset($_SESSION['korisnicko_ime']))
{
    header("Location: login.php");
    exit();
}

if($_SESSION['razina'] != 1)
{
?>
<!DOCTYPE html>
<html lang="hr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pristup odbijen</title>
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
        <li><a href="logout.php">odjava</a></li>
    </ul>
</nav>

<main class="admin-container">
    <h1>Pozdrav <?php echo $_SESSION['korisnicko_ime']; ?>!</h1>

    <p class="access-message">
        Nemate administratorska prava za pristup upravljanju vijestima.
    </p>

    <a href="index.php" class="admin-button">
        Povratak na početnu
    </a>

</main>

<footer>
    <p>france.tv</p>
</footer>

</body>
</html>

<?php
exit();
}

include 'connect.php';

$sql = "SELECT * FROM vijesti ORDER BY id DESC";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="hr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Administracija</title>
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
        <li><a href="unos.html">nova vijest</a></li>
        <li><a href="administrator.php">upravljanje</a></li>
        <li><a href="logout.php">odjava</a></li>
    </ul>
</nav>

<main class="admin-container">

<h1>Administracija vijesti</h1>

<table>

<tr>
    <th>ID</th>
    <th>Naslov</th>
    <th>Kategorija</th>
    <th>Arhiva</th>
    <th>Uredi</th>
    <th>Obriši</th>
</tr>

<?php

while($row = mysqli_fetch_assoc($result))
{
?>

<tr>

    <td><?php echo $row['id']; ?></td>

    <td><?php echo $row['naslov']; ?></td>

    <td><?php echo $row['kategorija']; ?></td>

    <td><?php echo $row['arhiva']; ?></td>

    <td>
        <a class="akcija-link"
           href="uredi.php?id=<?php echo $row['id']; ?>">
            Uredi
        </a>
    </td>

    <td>
        <a class="akcija-link"
           href="obrisi.php?id=<?php echo $row['id']; ?>">
            Obriši
        </a>
    </td>

</tr>

<?php
}
?>

</table>

</main>

<footer>
    <p>france.tv</p>
</footer>

</body>
</html>