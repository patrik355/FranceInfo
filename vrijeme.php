<?php

$gradovi = [
    "Paris" => ["lat" => 48.85, "lon" => 2.35],
    "Lyon" => ["lat" => 45.75, "lon" => 4.85],
    "Marseille" => ["lat" => 43.30, "lon" => 5.37],
    "Nice" => ["lat" => 43.70, "lon" => 7.26],
    "Toulouse" => ["lat" => 43.60, "lon" => 1.44],
    "Bordeaux" => ["lat" => 44.84, "lon" => -0.58],
    "Strasbourg" => ["lat" => 48.58, "lon" => 7.75],
    "Lille" => ["lat" => 50.63, "lon" => 3.06]
];

?>
<!DOCTYPE html>
<html lang="hr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Vrijeme</title>
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

<main class="weather-container">

    <h1>Vremenska prognoza</h1>
    <p class="weather-update">
        Posljednje ažuriranje:
        <?php echo date("d.m.Y. H:i"); ?>
    </p>
    <div class="weather-grid">

<?php

foreach($gradovi as $imeGrada => $podaci)
{
    $lat = $podaci['lat'];
    $lon = $podaci['lon'];

    $url =
    "https://api.open-meteo.com/v1/forecast"
    . "?latitude=".$lat
    . "&longitude=".$lon
    . "&current=temperature_2m,relative_humidity_2m,wind_speed_10m,weather_code";

    $json = file_get_contents($url);

    $data = json_decode($json, true);

    $temp =
        $data['current']['temperature_2m'];

    $vlaga =
        $data['current']['relative_humidity_2m'];

    $vjetar =
        $data['current']['wind_speed_10m'];

    $weatherCode =
        $data['current']['weather_code'];

    switch($weatherCode)
    {
        case 0:
            $ikona = "☀️";
            $opis = "Vedro";
            break;

        case 1:
        case 2:
        case 3:
            $ikona = "⛅";
            $opis = "Djelomično oblačno";
            break;

        case 45:
        case 48:
            $ikona = "🌫️";
            $opis = "Magla";
            break;

        case 61:
        case 63:
        case 65:
            $ikona = "🌧️";
            $opis = "Kiša";
            break;

        case 71:
        case 73:
        case 75:
            $ikona = "❄️";
            $opis = "Snijeg";
            break;

        case 95:
            $ikona = "⛈️";
            $opis = "Grmljavina";
            break;

        default:
            $ikona = "☁️";
            $opis = "Oblačno";
    }

?>

<div class="weather-card">

    <h2><?php echo $imeGrada; ?></h2>

    <div class="weather-icon">
        <?php echo $ikona; ?>
    </div>

    <div class="weather-temp">
        <?php echo $temp; ?>°C
    </div>

    <p><?php echo $opis; ?></p>

    <p><strong>Vjetar:</strong>
        <?php echo $vjetar; ?> km/h
    </p>

    <p><strong>Vlaga:</strong>
        <?php echo $vlaga; ?>%
    </p>

</div>

<?php
}
?>

</div>

</main>

<footer>
<p>france.tv</p>
</footer>

</body>
</html>