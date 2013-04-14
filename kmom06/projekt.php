<?php

$html = <<<EOD
<div id="main-content">   
<div id="left-col">	
	<div class="breadMenu">
        <ul>
            <li><a href="projekt.php">Projekt</a></li>
            <li><a href="hangman.php">Hangman</a></li>
            <li><a href="diceNew.php">Dice</a></li>            
        </ul> 
        <br style="clear:left"/>   
        </div>
        <p style="margin-top:10px;">
        <h1>Mina projekt</h1>
           <h3> Här ligger mina projekt under kursen</h3>
        
        </p>
</div> <!-- END left-col -->			
<div class="clear"></div>
</div> <!-- END main-content -->    	
EOD;

//--------------------
// Skapa och skriv ut sidan

require_once('common.php');
$title = "Redovisning Ralf E";
$charset = "iso-8859-1";
$language = "sv";

$html = <<<EOD
<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{$language}" lang="{$language}">  
    <head>
       <meta http-equiv="Content-Type" content="text/html; charset={$charset}" />
        <title>{$title}</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
    </head>
    	<body>
    		<div id="wrapper"> 
    		{$header}	    		      
	        {$html}
	        </div><!-- END wrapper -->       
    		{$footer}
    	</body>
</html>
EOD;
echo $html;
?>