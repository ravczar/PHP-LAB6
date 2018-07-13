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
echo "<H1><center>Oto aktualny stan bazy danych.</center></H1><br><br>";
?>
<center>
<table>
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
	<input type="submit" name="imie" value="IMIE">
	<input type="submit" name="nazwisko" value="NAZWISKO">
	<input type="submit" name="rok" value="ROK">
	<input type="submit" name="miejsce" value="MIEJSCE">
	
   </center>
  </fieldset>
	<br></br>

	
	
	
	
<?php // ####   PRZYCISK DO SORTOWANIA PO "ID" #### //

if(isset($_POST['Id'])){
echo " <center><H1> Tabela posegregowana po ID </H1></center>";
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
	
	$query = "SELECT * FROM osoba ORDER BY Id";
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
  }


mysql_close($con);

/// #### KONIEC #####
?>


<?php // ####   PRZYCISK DO SORTOWANIA PO "IMIE" #### //

if(isset($_POST['imie'])){
echo " <center><H1> Tabela posegregowana po IMIE </H1></center>";
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
	
	$query = "SELECT * FROM osoba ORDER BY Imie";
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
  }


mysql_close($con);

/// #### KONIEC #####
?>	


<?php // ####   PRZYCISK DO SORTOWANIA PO "NAZWISKO" #### //

if(isset($_POST['nazwisko'])){
echo " <center><H1> Tabela posegregowana po NAZWISKO </H1></center>";
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
	
	$query = "SELECT * FROM osoba ORDER BY Nazwisko";
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
  }


mysql_close($con);

/// #### KONIEC #####
?>	



<?php // ####   PRZYCISK DO SORTOWANIA PO "ROK" #### //

if(isset($_POST['rok'])){
echo " <center><H1> Tabela posegregowana po ROK </H1></center>";
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
	
	$query = "SELECT * FROM osoba ORDER BY Rok_urodzenia";
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
  }


mysql_close($con);

/// #### KONIEC #####
?>	


<?php // ####   PRZYCISK DO SORTOWANIA PO "MIEJSCE" #### //

if(isset($_POST['miejsce'])){
echo " <center><H1> Tabela posegregowana po MIEJSCE </H1></center>";
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
	
	$query = "SELECT * FROM osoba ORDER BY Miejsce_urodzenia";
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
  }


mysql_close($con);

/// #### KONIEC #####
?>	

</form>
</body>
</html>
