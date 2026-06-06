<?php
include 'connect.php';

$naslov = $_POST['naslov'];
$sazetak = $_POST['sazetak'];
$tekst = $_POST['tekst'];
$kategorija = $_POST['kategorija'];
$naslov = mysqli_real_escape_string($conn, $naslov);
$sazetak = mysqli_real_escape_string($conn, $sazetak);
$tekst = mysqli_real_escape_string($conn, $tekst);
$kategorija = mysqli_real_escape_string($conn, $kategorija);
$arhiva = 1;

if(isset($_POST['arhiva']))
{
    $arhiva = 0;
}

$datum = date("Y-m-d H:i:s");

$slika = $_FILES['slika']['name'];

$target = "slike/" . $slika;

move_uploaded_file(
    $_FILES['slika']['tmp_name'],
    $target
);

$sql = "INSERT INTO vijesti
(
    datum,
    naslov,
    sazetak,
    tekst,
    slika,
    kategorija,
    arhiva
)
VALUES
(
    '$datum',
    '$naslov',
    '$sazetak',
    '$tekst',
    '$slika',
    '$kategorija',
    '$arhiva'
)";
mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="hr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $naslov; ?></title>
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

        <li>
            <a href="kategorija.php?kategorija=elections">
                elections
            </a>
        </li>

        <li>
            <a href="kategorija.php?kategorija=lesjt">
                les jt
            </a>
        </li>

        <li>
            <a href="unos.html">
                nova vijest
            </a>
        </li>

        <li>
            <a href="administrator.php">
                upravljanje
            </a>
        </li>
    </ul>
</nav>
<main class="clanak-container">
    <h1 class="clanak-naslov">
        <?php echo $naslov; ?>
    </h1>
    <p class="clanak-podnaslov">
        <?php echo $sazetak; ?>
    </p>
    <div class="slika-container">
        <img src="slike/<?php echo $slika; ?>" alt="">
    </div>
    <p>
        <?php
        echo nl2br(
            str_replace(
                array('\r\n','\n','\r'),
                "<br>",
                $tekst
            )
        );?>
    </p>
    <p>
        Kategorija:
        <strong><?php echo $kategorija; ?></strong>
    </p>
</main>
<footer>
    <p>france.tv</p>
</footer>
</body>
</html>