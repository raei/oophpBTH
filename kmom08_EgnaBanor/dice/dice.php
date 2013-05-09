<?php


// Tärning
echo "Slagserie:";

$antalSlag = 6;
$summa = 0;

for($i = 0; $i < $antalSlag; $i++){
	$slump = rand(1,6);//slumpar ett tal mellan 1 - 6
	echo " " .$slump;//skriver ut slumptalet	
	$summa = $summa + $slump;//summerar slumptalet
}//end for

echo "<br>Summan av slagserien: " .$summa;

$medel = $summa/$antalSlag;//beräknar medelvärdet
$medel = number_format($medel, 1, '.', '');//formaterar medelvärdet till en decimal
echo "<br>Medelvärdet av slagserien är: " .$medel;

// Matematiska funktioner
echo "<br> Värdet av PI: " .pi();	

//omvandla hexadecimala 1A till decimaltal
echo "<br>Decimalvärdet av hextalet 1A = " .hexdec("1A");

echo "<br>Kvadratroten ur 2: " .sqrt(2);


?>