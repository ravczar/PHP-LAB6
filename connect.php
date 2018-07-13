<?php
if(!$db_lnk = mysqli_connect("localhost", "s16281", "Raf.Czar")){
exit('Wystapil blad podczas proby polaczenia z serwerem MYSQL... <br />');}

else{
	echo 'Polaczenie z baza danych zostalo nawiazane ... <br/>';}
	
if(!mysqli_select_db($db_lnk, 's16281')){ 									// TU nazwa indexu jako nazwa bazy danych
	echo 'Wystapil blad podczas wyboru bazy danych: nazwa_bazy <br />';}

else{
	echo 'Zostala wybrana baza danych s16281 <br / >';}
	
if(!mysqli_close($db_lnk)){
	echo 'Wystapil blad podczas zamykania polaczenia z serwerem MYSQL... <br />';}

else {
	echo 'Polaczenie z serwerem MYSQL zostalo zamkniete... <br />';}
	
?>
