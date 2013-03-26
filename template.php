<?php
// ===========================================================================================
//
// template.php
//
// Description: Min snygga template
//
// Author: Ralf Eriksson
//

// -------------------------------------------------------------------------------------------
//
// Error handling on/off
//
error_reporting(E_ALL | E_STRICT);
$debug = "";
$debugEnable = TRUE;  // TRUE to enable debugging, FALSE to not print out debug information


// -------------------------------------------------------------------------------------------
//
// Take care of GET variables
//
$char= (empty($_POST['char'])? "" : $_POST['char']);

// -------------------------------------------------------------------------------------------
//
// The content of the page
//

$html = <<<EOD
<div id="main-content">   
    <div id="left-col">	
        <h1>Min template</h1>	
        <p>
                Här kommer sidans innehåll
        </p>								
        </div> <!-- END left-col -->
    <div class="clear"></div>
</div> <!-- END main-content -->    	
EOD;

// -------------------------------------------------------------------------------------------
//
// Create and print out the html-page
//
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
echo $html;
?>