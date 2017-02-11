<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Bahiana" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
</head>
<body>
<div id="header">Knygų bazė</div>
<div id="blist">
<h2 style="color: #527A73; font-family: 'Ubuntu', sans-serif;">Knygų sąrašas:</h2>
<?php
// Jungiamės prie DB.
$conn = new mysqli("mysql.hostinger.lt", "xxx", "xxx", "xxx");
// Tikrina ar prisijungta.
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM knygos";
$result = $conn->query($sql);
$count = $result->num_rows; // suskaičiuoja kiek yra įrašų DB.

if ($count > 0) {
    // Ciklas, kad atspausdinti visas lenteles.
    while($row = $result->fetch_assoc()) {
        echo "<a href='binfo.php?val=".$row["ID"]."'>".$row["ID"]. ". ". $row["pavadinimas"]. ". " . $row["autorius"]."."."<br></a>";
    }
} else {
    echo "Nėra įrašų";
}
$conn->close();
?>
</div>
</body>
</html>
