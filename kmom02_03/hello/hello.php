<?php
// ==================================================================
//
// hello.php
//
// Description: Using error reporting and testing bug
//
// Author: Ralf Eriksson
//
// ==================================================================
?>
<!doctype html>
<html>
    <head>
        <meta charset=utf-8>
        <meta name=description content="">
        <meta name=viewport content="width=device-width, initial-scale=1">
        <title>Help PHP Ralf E</title>
        <link rel=stylesheet href="css/style.css">
        <link rel=author href="humans.txt">
    </head>
    <body>
		<?php
			error_reporting(E_ALL);
			echo "Hello World!";
			echo $i;
		?>
	</body>
</html>