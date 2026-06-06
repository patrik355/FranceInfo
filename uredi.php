<?php
include 'connect.php';
$id = $_GET['id'];
$sql = "SELECT * FROM vijesti WHERE id=$id";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="hr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Uredi vijest</title>
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
<h1>Uredi vijest</h1>
<form action="update.php" method="POST" enctype="multipart/form-data">
<input type="hidden"
       name="id"
       value="<?php echo $row['id']; ?>">

<label>Naslov vijesti</label>
<input  class="admin-input"
       type="text"
       name="naslov"
       value="<?php echo htmlspecialchars($row['naslov']); ?>">
<label>Sažetak</label>
<textarea class="admin-textarea" name="sazetak"><?php
echo htmlspecialchars($row['sazetak']);
?></textarea>
<img src="slike/<?php echo $row['slika']; ?>"
     class="preview-slika">
<label>Tekst vijesti</label>
<textarea class="admin-textarea" name="tekst"><?php
echo htmlspecialchars($row['tekst']);
?></textarea>
<label>Nova slika</label>
<input type="file"
       name="slika">
<button class="admin-button"
        type="submit">
    Spremi promjene
</button>
</form>
</main>

<footer>
    <p>france.tv</p>
</footer>
</body>
</html>