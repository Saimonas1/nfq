<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="binfo">
<?php
	$val = $_GET['val'] - 1; // knygos ID gautas iš index PHP.
	// Jungiamės prie DB.
	$conn = new mysqli("mysql.hostinger.lt", "u378777602_saimo", "ruhamalt", "u378777602_saimo");
	// Tikrina ar prisijungta.
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	$sql = "SELECT * FROM knygos LIMIT ".$val.",1"; // paima eilutę iš DB pagal ID.
	$result = $conn->query($sql);
    $row = $result->fetch_assoc();
	// Knygos informacijos spausdinimas.
    echo "<b>Pavadinimas:</b> " . $row["pavadinimas"]. "<br><b>Metai:</b> " . $row["metai"]. "<br><b>Autorius:</b> " . $row["autorius"]."<br><b>Žanras:</b> " . $row["zanras"]. "<br>";
	echo "<br><a style='border: none' href='index.php'>Grįžti į knygų sąrašą</a>";
	$conn->close();
?>
</div>
</body>
</html>