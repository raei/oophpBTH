<?php

$html = <<<EOD
<div id="main-content">   
<div id="left-col">	
				<h1>Dice game</h1>				
				<p>		
					Jag bor i Storvik(G�strikland) med min familj. Spelar musik p� fritiden.
					Den h�r kursen �r bra f�r mig d� vi har lagt in webprogrammering
					p� teknikprogrammets Inriktning Informations- och medieteknik.
				</p>						
			</div> <!-- END left-col -->			
			<div id="right-col"></div>
<div class="clear"></div>
</div> <!-- END main-content -->    	
EOD;

//--------------------
// Skapa och skriv ut sidan

require_once('../common.php');
$title = "oophp Ralf Eriksson";
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
        <link href="../style.css" rel="stylesheet" type="text/css" />
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