<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title> Sortowanie bazy danych </title>
</head>
<body>
<form method="POST" action="">

<?php
//Łączymy się z baza danych
$db_lnk = mysqli_connect("localhost", "s16281", "Raf.Czar");
mysqli_select_db($db_lnk, 's16281');
echo "<H1><center>Oto aktualny stan bazy danych @szuflandia.</center></H1><br><br>";
?>
<center>
<table border ="5">
<tr>
<td><b> Id </b></td>
<td><b> Imie </b></td>
<td><b> Nazwisko </b></td>
<td><b> Rok urodzenia </b></td>
<td><b> Miejsce urodzenia </b></td>
</tr>

<?php
$query1 = "select * from osoba";
$result = mysqli_query($db_lnk, $query1);
$ile = mysqli_num_rows($result);
mysqli_close($db_lnk);  												// konczymy polaczenie z baza danych

while($row = mysqli_fetch_row($result)) {
	echo "<tr>";
	echo "<td>$row[0]</td>";
	echo "<td>$row[1]</td>";
	echo "<td>$row[2]</td>";
	echo "<td>$row[3]</td>";
	echo "<td>$row[4]</td>";
	echo "</tr>";
}

?>
</table>
</center>

	<br>
	</br>
  <fieldset>
   <center>
	<legend><b>  Order BY: </b></legend><br />
	<input type="submit" name="Id" value="ID">
	<input type="submit" name="Imie" value="IMIE">
	<input type="submit" name="Nazwisko" value="NAZWISKO">
	<input type="submit" name="Rok" value="ROK">
	<input type="submit" name="Miejsce" value="MIEJSCE"> </br>
	<a href= test.php>Dodaj wpis</a>
	<a href= kasowanie.php>Kasowanie</a>
	
   </center>
  </fieldset>
	<br></br>
	
	
	
<?php  // FUNKCJA WŁASNA do pobierania posortowanych juz danych z bazy danych s16281
function segrId($zmienna){
echo " <center><H1> Tabela posegregowana po '$zmienna' </H1></center>";
		echo '<center>
			<table>
			<tr>
			<td><b> Id </b></td>
			<td><b> Imie </b></td>
			<td><b> Nazwisko </b></td>
			<td><b> Rok urodzenia </b></td>
			<td><b> Miejsce urodzenia </b></td>
			</tr>';
	$db_lnk = mysqli_connect("localhost", "s16281", "Raf.Czar");
	mysqli_select_db($db_lnk, 's16281');
	
	$query = "SELECT * FROM osoba ORDER BY $zmienna";
	$result = mysqli_query($db_lnk, $query);
	mysqli_close($db_lnk);
			
			while($row = mysqli_fetch_row($result))
			{
			echo "<tr>";
			echo "<td>$row[0]</td>";
			echo "<td>$row[1]</td>";
			echo "<td>$row[2]</td>";
			echo "<td>$row[3]</td>";
			echo "<td>$row[4]</td>";
			echo "</tr>";
			}
		echo  '</table>
			</center>
			<br>
			</br>';
 
mysql_close($con);


}
?>



<?php  // Wywołanie po nacisnieciu sortuj ID
if(isset($_POST['Id'])){
	$zmienna = 'Id';
	echo segrId($zmienna);
}	
?>

<?php // Wywołanie po nacisnieciu sortuj IMIE
if(isset($_POST['Imie'])){
	$zmienna = 'Imie';
	echo segrId($zmienna);
}	
?>

<?php // Wywołanie po nacisnieciu sortuj NAZWISKO
if(isset($_POST['Nazwisko'])){
	$zmienna = 'Nazwisko';
	echo segrId($zmienna);
}	
?>

<?php // Wywołanie po nacisnieciu sortuj ROK
if(isset($_POST['Rok'])){
	$zmienna = 'Rok_urodzenia';
	echo segrId($zmienna);
}	
?>

<?php // Wywołanie po nacisnieciu sortuj MIEJSCE
if(isset($_POST['Miejsce'])){
	$zmienna = 'Miejsce_urodzenia';
	echo segrId($zmienna);
}	
?>

</form>
</body>
</html>
