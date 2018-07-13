<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title> Odczyt danych z bazy </title>
</head>
<body>
<form method="POST" action="">
	 

<?php
echo "<b><center>Oto aktualny stan bazy danych @szuflandia.</center></b><br><br>";

if(!$db_lnk = mysqli_connect("localhost", "s16281", "Raf.Czar")){
 echo 'Blad podczas proby polaczenia z serwerem MySQL ... <br/>';
 echo '</body></html>';
 exit;
 }
 
 if (!mysqli_select_db($db_lnk, 's16281')){
  mysqli_close($db_lnk);
  echo "Blad podczas wyboru bazy danych: testphp <br />";
  echo '</body></html>';
  exit;
 }
 ?>
 
 
<table border="5">
<tr>
<td> Id </td>
<td> Imie </td>
<td> Nazwisko </td>
<td> Rok urodzenia </td>
<td> Miejsce urodzenia </td>
</tr>

<?php
$query1 = "select * from osoba";
$result = mysqli_query($db_lnk, $query1);

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
<?php

if(!mysqli_close($db_lnk)){
	echo 'Blad podczas zamykania polaczenia z serwerem MYSQL ... <br/>';
}
?>

<br>
</br>
<fieldset> 
	<legend>Dodawanie użytkowników:</legend><br />
                    <label>Imie: 	 	</label> <input type="text" name="imie" /><br />
                    <label>Nazwisko: 	</label> <input type="text" name="nazwisko" /><br />
                    <label>Rok ur.:  	</label> <input type="text" name="rok" /><br />
                    <label>Miejsce ur.: </label> <input type="text" name="miejsce" /><br />
                    <input type="submit" value="Prześlij" >
					<input name= "reset" type="reset"  value="Czyść" >
</fieldset>
<br>
<br>

<?php
// Przypisanie frmularza do krótszych zmiennych.


	if (isset($_POST['imie']) && ($_POST['nazwisko']) && ($_POST['rok']) && ($_POST['miejsce']) ){
	$a = $_POST['imie'];
	$b = $_POST['nazwisko'];
	$c = $_POST['rok'];
	$d = $_POST['miejsce'];
	
	if (!$db_lnk = mysqli_connect ("localhost", "s16281", "Raf.Czar")){
		echo 'Błąd podczas próby połączenia z serwerem MySQL... <br />';
		exit;
}

	if(!mysqli_select_db($db_lnk,'s16281')){
		mysqli_close($db_lnk);
		exit ('Błąd podczas wyboru bazy danych: s16281 <br />');
}
	//Tu następuje przeniesienie wartości naszych zmiennych do bazy MySQL
	$query = "INSERT INTO osoba(Imie, Nazwisko,Rok_urodzenia, Miejsce_urodzenia)VALUES (";
	$query .= " '$a', '$b', '$c', '$d' ";
	$query .= ")";
	if (!$result = mysqli_query($db_lnk, $query)){
		mysqli_close($db_lnk);
		exit ('Błąd: zapytanie zostało odrzucone... </br />');
 }
 
	$rowsNo = mysqli_affected_rows($db_lnk);
	echo "Liczba dodanych rekordów: $rowsNo <br />";
	
	if (!mysqli_close($db_lnk)){
		echo 'Bład podczas zamykania połączenia z serwerem MySQL...<br />';
 }
header("Location:kasowanie.php", true);
}


else {
	echo " Na pewno uzupełniłeś wszystkie pola i kliknąłeś przycisk wyślij? ";
	}
?>
</form>	            
</body>
</html>
