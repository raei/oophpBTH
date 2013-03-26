<?php
//	
// =======================================================================
//
// strings.php
//
// Description: Manage Strings in PHP.
//
// Author: Ralf Eriksson
// =======================================================================
//
?>
<!doctype html>
<html>
    <head>
        <meta charset=utf-8>
        <meta name=description content="">
        <meta name=viewport content="width=device-width, initial-scale=1">
        <title>String PHP Ralf E</title>
        <link rel=stylesheet href="css/style.css">
        <link rel=author href="humans.txt">
    </head>
    <body>
	    <?php
			// -----------------------------------------------------------------------
			//
			// Error handling on/off
			//
			error_reporting(E_ALL);
			$s1 = "martin ";
			$s2 = "komplex ";
			$s3 = "databaser ";
			$s4 = "tennis ";
			$s5 = "php ";
			echo "Fem olika delsträngar: " . $s1 . "<br />" . $s2 . $s3 . $s4 . $s5 .    "<br />";		

			$s6 = $s1 . $s2 . $s3 . $s4 . $s5;
			echo "En sammanslagen sträng: " . $s6 . "<br />";
			echo "En sammanslagen sträng (igen):  $s6 <br />";
			echo "En sammanslagen sträng (igen * 2): {$s6} <br />";
			
			echo "<br />";   // HTML-tecken färg ny rad, ger ny rad	
			$t6 = strlen($s6);
			echo "Strängen s6 innehaller {$t6} tecken. <br /> ";

			$t1 = strlen($s1);
			$t2 = strlen($s2);
			$t3 = strlen($s3);
			$t4 = strlen($s4);
			$t5 = strlen($s5);

			$t15 = $t1 + $t2 + $t3 + $t4 + $t5;
			echo "Strängen s1 - s5 innehaller {$t15} tecken.<br />";

			if($t6 == $t15){
				echo "Yes <br />";
			}else{
				echo "Ajda... <br />";
			}

			echo($t6 == $t15 ? "Yes" : "Ajda..") . "<br />";//Variant if else sats
		?>		       
    </body>
</html>

