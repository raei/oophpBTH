<?php

// ===========================================================================================
//
// friendSearchGoogle.php
//
// Description: A PHP-Mysql search for my friends and there computer equipment
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
$search = (empty($_GET['search']) ? "" : $_GET['search']);


// -------------------------------------------------------------------------------------------
//
// The content of the page
//

$html = <<<EOD
<div id="header">    
    <h1>Friend Search</h1>
</div><!-- end header -->      
EOD;

$html .= <<<EOD
<div id="searchBar">    
    <form id="searchbox" action="{$_SERVER['PHP_SELF']}" method="get">
        <input id="search" type="text" name="search" value="{$search}"  placeholder="Search friends!"/>
        <input id="submit" type="submit" value="Search"/> 
    </form>
</div><!-- end searchBar -->      
EOD;

        
//---------------------
// jscript
//
        
$script = <<<EOD
       <script> 
        $(document).ready(function() {           
	if (!Modernizr.input.placeholder)
	{		
		var placeholderText = $('#search').attr('placeholder');
		
		$('#search').attr('value',placeholderText);
		$('#search').addClass('placeholder');
		
		$('#search').focus(function() {				
			if( ($('#search').val() == placeholderText) )
			{
				$('#search').attr('value','');
				$('#search').removeClass('placeholder');
			}
		});
		
		$('#search').blur(function() {				
			if ( ($('#search').val() == placeholderText) || (($('#search').val() == '')) )                      
			{	
				$('#search').addClass('placeholder');					  
				$('#search').attr('value',placeholderText);
			}
		});
	}                
});
        </script>
        
EOD;

// ----------------------------------------------------------------------------
//
// Connect to the database server
//

// Host, database, user and password stored in separate file
require_once('config.php');

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

if (mysqli_connect_error()) {
   echo "Connect failed: ".mysqli_connect_error()."<br>";
   exit();
}

//$html .= "<p>Connected successfully</p>";


// ----------------------------------------------------------------------------
//
// Prepare and perform a SELECT query
//


// Clean data
$search = $mysqli->real_escape_string($search);

// Prepare query
$query = <<<EOD
SELECT * 
FROM VKompisUtrustning 
WHERE
    Namn LIKE '%{$search}%' 
    OR 
    Smeknamn LIKE '%{$search}%'
    OR 
    Utrustning LIKE '%{$search}%'
    ORDER BY Namn;
;
EOD;
    
    


if(!empty($search)) {
    // Execute query
    $res = $mysqli->query($query) 
                    or die("Could not query database, query =<br/><pre>{$query}</pre><br/>{$mysqli->error}");  

  
    // **************************************************************************************** 
    // Show the results of the query Friends name and all the equipment they have
    // **************************************************************************************** 
    if ($res->num_rows > 0) {
            $runda = true;
            $tempName = "";
            $row = $res->fetch_object();

            do {     
                if($row->Namn != $tempName ){
                    $html .= "<div id='pInfo'><p><h3>". $row->Namn . "</h3>Född: <h4>" . $row->Fodd . "</h4> Smeknamn: <h4>" . $row->Smeknamn . "</h4></p><p><h5>Utrustning</h5></p></div><div id='pUtrustning'> <h6> - " . $row->Utrustning . "</h6></div>"; 
                }else{                  
                      $html .= "<div id='pUtrustning'> <h6> - " . $row->Utrustning . "</h6></div>";  
                }         
                $tempName =  $row->Namn;

            } while ($row = $res->fetch_object());

            $res->close();       
      }//end if inner
 }//end if outer
// -------------------------------------------------------------------------------------------
//
// Create and print out the html-page
//
//require_once('common.php');
$title       = "Ralf's FriendSearch";
$charset     = "iso-8859-1";
$language    = "sv";

$html = <<< EOD
<?xml version="1.0" encoding="{$charset}" ?> 
<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{$language}" lang="{$language}">  
    <head>
        <meta http-equiv="Content-Type" content="text/html; {$charset};" />      
        <title>{$title}</title>        
        <link href="css/searchStyleGoogle.css" rel="stylesheet" type="text/css" />
    </head>
    <body> 
        <div id="container">            
                {$html}           
        </div><!-- end container -->
            {$script}
    </body>
</html>
EOD;

header("Content-Type: application/xhtml+xml; charset={$charset}");
echo $html;
exit;
?>
