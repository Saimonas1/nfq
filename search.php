<!DOCTYPE html>
<html>
<head>
<title>Paieškos rezultatai</title>
<link rel="icon" href="http://tibiacanob.com/layout/images/global/general/books1.png">
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Bahiana" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
</head>
<body>
<div id="header">Knygų bazė</div>
<div id="blist">
<h2 style="color: #527A73; font-family: 'Ubuntu', sans-serif; transition: 1s;">Paieškos rezultatai:</h2>
<?php
// Jungiames prie DB.
$conn = new mysqli("mysql.hostinger.lt", "u378777602_saimo", "ruhamalt", "u378777602_saimo");
// Tikrina ar prisijungta.
if ($conn->connect_error) {
    die("Prisijungimo klaida: " . $conn->connect_error);
}
 
$src = $_GET['src'];
$sql = "SELECT * FROM knygos
            WHERE (`pavadinimas` LIKE '%".$src."%') OR (`autorius` LIKE '%".$src."%')";
$result = $conn->query($sql);
$count = $result->num_rows; // suskaiciuoja kiek yra irasu DB.
if ($count > 0) {
    // Ciklas, kad atspausdinti visas lenteles.
    while($row = $result->fetch_assoc()) {
        echo "<a href='binfo.php?val=".$row["ID"]."'>". $row["pavadinimas"]. ". " . $row["autorius"]."."."<br></a>";
    }
} else {
    echo "Nieko nerasta.<br>";
}
echo "<br><a style='color: #527A73; transition: 0s;' href='index.php'>Grįžti į knygų sąrašą</a>";
$conn->close();
?>
</div>
<div id="footer"><b>Coded by:</b> Saimonas Razokas<div>
</body>
</html>