<?php

include 'connect.php';

$kategorija = $_GET['kategorija'];

?>

<!DOCTYPE html>
<html lang="hr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $kategorija; ?></title>

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

<main>

<section class="kategorija">

<h1>

<?php

if($kategorija == 'elections')
{
    echo "ÉLECTIONS EUROPÉENNES 2019";
}
else
{
    echo "LES JT";
}

?>

</h1>

<div class="vijesti">

<?php

$sql = "SELECT *
        FROM vijesti
        WHERE kategorija='$kategorija'
        AND arhiva=0
        ORDER BY id ASC";

$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result))
{
?>

<article class="kartica">

    <img src="slike/<?php echo $row['slika']; ?>" alt="">

    <a href="clanak.php?id=<?php echo $row['id']; ?>">

        <?php echo $row['naslov']; ?>

    </a>

</article>

<?php
}
?>

</div>

</section>

</main>

<footer>
    <p>france.tv</p>
</footer>

</body>
</html>