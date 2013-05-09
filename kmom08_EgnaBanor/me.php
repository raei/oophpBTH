<?php

$html = <<<EOD
<div id="main-content">   
<div id="left-col">	
				<h1>Om Mig</h1>	
				<p>
					Jag heter Ralf Eriksson och jag är en av alla elever i kursen DV1127.
					Jag jobbar sedan 2000 på Bessemerskolan i Sandviken där jag ansvarar
					för teknikprogrammets IT inriktning. Fick det jobbet strax efter jag
					slutfört mina studier på Högskolan i Gävle där jag fixade en filkand i data.
					Läste senare in pedagogiken(PPU) för att bli behörig lärare.
					Har tidigare läst kursen Html/Php på BTH.
				</p>
				<p>		
					Jag bor i Storvik(Gästrikland) med min familj. Spelar musik på fritiden.
					Den här kursen är bra för mig då vi har lagt in webprogrammering
					på teknikprogrammets Inriktning Informations- och medieteknik.
				</p>						
			</div> <!-- END left-col -->			
			<div id="right-col"></div>
<div class="clear"></div>
</div> <!-- END main-content -->    	
EOD;

//--------------------
// Skapa och skriv ut sidan

require_once('common.php');
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
header("Content-Type: application/xhtml+xml; charset={$charset}");
echo $html;
?>