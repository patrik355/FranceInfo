<?php

include 'connect.php';

$id = $_GET['id'];

$sql = "SELECT * FROM vijesti WHERE id=$id";

$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);

if(!$row)
{
    die("Članak nije pronađen.");
}

?>

<!DOCTYPE html>
<html lang="hr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $row['naslov']; ?></title>

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

<main class="clanak-container">

    <h1 class="clanak-naslov">
        <?php echo $row['naslov']; ?>
    </h1>

    <p class="clanak-podnaslov">
        <?php echo $row['sazetak']; ?>
    </p>

    <img
        src="slike/<?php echo $row['slika']; ?>"
        class="clanak-slika"
        alt=""
    >

    <div class="clanak-tekst">
        <?php echo nl2br($row['tekst']); ?>
    </div>

</main>

<footer>
    <p>france.tv</p>
</footer>

</body>
</html>