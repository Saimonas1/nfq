<!DOCTYPE html>
<html>
<head>
<title>Knygų bazė</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="icon" href="http://tibiacanob.com/layout/images/global/general/books1.png">
<link href="https://fonts.googleapis.com/css?family=Bahiana" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
</head>
<body>
<div id="header">Knygų bazė</div>
<div id="blist">
<div style="display: inline; width: 100%;">
<!--Rikiavimo selectorius-->
<select onchange="javascript:handleSelect(this)">
  <option style="color: red;" value="">Rikiuoti pagal:</option>
  <option value="aid">ID</option>
  <option value="pav">Pavadinimą</option>
  <option value="aut">Autorių</option>
  <option value="gen">Žanrą</option>
  <option value="metai">Metus</option>
</select>
<!--Paieškos input'as ir button'as-->
<form style="display: inline;" action="search.php" method="GET">
    <input id="searchinp" type="text" name="src" />
    <input id="searchbtn" type="submit" value="Ieškoti" />
</form>
</div>
<script type="text/javascript">
function handleSelect(elem)
{	
	window.location = "index.php?sort=" + elem.value;
}
</script>
<h2 style="color: #527A73; font-family: 'Ubuntu', sans-serif; transition: 1s;">Knygų sąrašas:</h2>
<?php
// Jungiamės prie DB.
$conn = new mysqli("mysql.hostinger.lt", "dbuser", "dbpass", "dbpav");
// Tikrina ar prisijungta.
if ($conn->connect_error) {
    die("Prisijungimo klaida: " . $conn->connect_error);
} 

$sql = "SELECT * FROM knygos";
//Rikiavimas
if ($_GET['sort'] == 'pav')
{
    $sql .= " ORDER BY pavadinimas";
}
elseif ($_GET['sort'] == 'aut')
{
    $sql .= " ORDER BY autorius";
}
elseif ($_GET['sort'] == 'gen')
{
    $sql .= " ORDER BY zanras";
}
elseif($_GET['sort'] == 'aid')
{
    $sql .= " ORDER BY id";
}
elseif($_GET['sort'] == 'metai')
{
    $sql .= " ORDER BY metai";
}
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
<div id="footer"><b>Coded by:</b> Saimonas Razokas<div>
</body>
</html>
