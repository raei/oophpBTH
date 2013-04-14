<?php

// ===========================================================================================
//
// friendSearch.php
//
// Description: A PHP-Mysql implementation that shows how to access a MySQL 
// database from PHP through mysqli database extension.
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
// http://php.net/manual/en/book.mysqli.php
// http://php.net/manual/en/mysqli.connect-error.php
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
// http://php.net/manual/en/mysqli.query.php
// http://php.net/manual/en/mysqli.real-escape-string.php
// http://php.net/manual/en/mysqli-result.num-rows.php
//

// Sanitize data
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

    /*$html .= "<div id = 'main'> 
                <p>Query={$query}</p><p>Number of rows in resultset: " . $res->num_rows . "</p>
              </div><!-- end main -->";*/

  
// **************************************************************************************** 
// Show the results of the query 
// **************************************************************************************** 
if ($res->num_rows > 0) { 

$html .= <<<EOD
        
    <table id="table"> 
        <tr>            
            <th>ID</th> 
            <th>Namn</th> 
            <th>Smeknamn</th> 
            <th>Utrustning</th> 
            <th>Född</th> 
        </tr>        
EOD;
        
        $i = 1; 
        while ($row = $res->fetch_object()) {     
            $html .= "<tr><td>" . $i . "</td><td>" . $row->Namn . "</td><td>" . $row->Smeknamn . "</td><td>" . $row->Utrustning . "</td><td>" . $row->Fodd . "</td></tr>"; 
              $i++; 
        }

        $res->close();  

       $html .= "</table>"; 

  }
 }
// -------------------------------------------------------------------------------------------
//
// Create and print out the html-page
//
//require_once('common.php');
$title       = "FriendSearch";
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
        <link href="css/searchStyle.css" rel="stylesheet" type="text/css" />
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
