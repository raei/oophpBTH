<?php


// T�rning
echo "Slagserie:";

$antalSlag = 6;
$summa = 0;

for($i = 0; $i < $antalSlag; $i++){
	$slump = rand(1,6);//slumpar ett tal mellan 1 - 6
	echo " " .$slump;//skriver ut slumptalet	
	$summa = $summa + $slump;//summerar slumptalet
}//end for

echo "<br>Summan av slagserien: " .$summa;

$medel = $summa/$antalSlag;//ber�knar medelv�rdet
$medel = number_format($medel, 1, '.', '');//formaterar medelv�rdet till en decimal
echo "<br>Medelv�rdet av slagserien �r: " .$medel;

// Matematiska funktioner
echo "<br> V�rdet av PI: " .pi();	

//omvandla hexadecimala 1A till decimaltal
echo "<br>Decimalv�rdet av hextalet 1A = " .hexdec("1A");

echo "<br>Kvadratroten ur 2: " .sqrt(2);


?>