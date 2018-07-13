<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title> Kasowanie z bazy danych </title>
</head>
<body>
<form method="POST" action="">

<?php
//Łączymy się z baza danych
$db_lnk = mysqli_connect("localhost", "s16281", "Raf.Czar");
mysqli_select_db($db_lnk, 's16281');
echo "<b><center>Oto aktualny stan bazy danych @szuflandia.</center></b><br><br>";
?>
<center>
 <table border="5">
  <tr>
	<td><b> Id </b></td>
	<td><b> Imie </b></td>
	<td><b> Nazwisko </b></td>
	<td><b> Rok urodzenia </b></td>
	<td><b> Miejsce urodzenia </b></td>
	<td><b> Kasujemy? </b></td>
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
	echo '<td><input type="checkbox" name="kasuj[]" value="'.$row[0].'" ></td>';  // Diabelskie odesłanie do zmiennej $row[0], by checkbox dostawal warotść ID naszej bazy danych
	echo "</tr>";
}

?>
 </table>
</center>
	<br>
	</br>
	<fieldset>
		<center>
      <legend><h2>  Wybierz opcję  </h2></legend><br />
	  <input type="button" value="Dodaj rekordy" onClick="location.href='test.php';" />
	  <input type="submit" name="submit" value="Usun zaznaczone rekordy">
	  <input type="button" value="Odśwież widok" onClick="location.reload();" />
	  <input type="button" value="Sortowanie rekordów" onClick="location.href='eksperyment.php';" />
		</center>
	<br></br>
	</fieldset>
<?php
if(isset($_POST['submit'])){
  if (isset($_POST['kasuj'])){
	$wynik = count ($_POST['kasuj']);
	$tab = $_POST['kasuj'];
	
		/*echo "Mamy tyle elementow wybranych: $wynik <br />";
		echo "A to są te elementy tablicy el.wybranych:<br />";
		for ($i=0;$i<$wynik; $i++){
		echo $tab[$i].'<br />';}   Zliczanie ile czego mamy*/
		
			$db_lnk = mysqli_connect("localhost", "s16281", "Raf.Czar");
			mysqli_select_db($db_lnk, 's16281');
					for ($i=0;$i<$wynik; $i++){
						$query = "DELETE FROM osoba where Id = '$tab[$i]'";
						$result = mysqli_query($db_lnk, $query);
						} 
					mysqli_close($db_lnk);
		echo "Liczba usunietych rekordów: $i <br />";							
  }
  else{
	  echo "Na pewno zaznaczyłeś?";}
}
else{
echo "Zaznac co chcesz usunąć i naciśnij przycisk USUN REKORDY";
}
?>
</form>
</body>
</html>
