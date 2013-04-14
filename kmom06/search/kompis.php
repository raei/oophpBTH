<?php

// ===========================================================================================
//
// kompis.php
//
// Description: A PHP-Mysql implementation that shows how to access a MySQL 
// database from PHP through mysqli database extension.
//
// Author: Mikael Roos
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
$search            = (empty($_GET['search'])            ? "" : $_GET['search']);


// -------------------------------------------------------------------------------------------
//
// The content of the page
//
$html = <<<EOD
<div>
<h1>Sök mina kompisar</h1>
<p>
Sök efter delsträngar på namn, smeknamn och utrustning. Matchande kompisar visas.
</p>

<form action="{$_SERVER['PHP_SELF']}" method="get"> 
<fieldset> 
<legend>Sök kompis</legend> 
<label for="search">Söksträng:</label> 
<input id="search" type="text" name="search" value="{$search}" />
<button type="submit" name="submit">Sök</button> 
</fieldset>
</form>

</div>

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

$html .= "<p>Connected successfully</p>";


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
SELECT 
    * 
FROM 
    VKompisUtrustning 
WHERE 
    Namn LIKE '%{$search}%' 
    OR 
    Smeknamn LIKE '%{$search}%'
    OR 
    Utrustning LIKE '%{$search}%'
;
EOD;

if(!empty($search)) {
    // Execute query
    $res = $mysqli->query($query) 
                    or die("Could not query database, query =<br/><pre>{$query}</pre><br/>{$mysqli->error}");

    $html .= "<p>Query={$query}</p><p>Number of rows in resultset: " . $res->num_rows . "</p>";


    // ----------------------------------------------------------------------------
    //
    // Show the results of the query
    //
    // http://php.net/manual/en/mysqli-result.fetch-object.php
    // http://php.net/manual/en/mysqli.close.php
    //
    $i = 1;
    while($row = $res->fetch_object()) {    
        $html .= $i . ": " . $row->Id . " - " . $row->Namn . " - " . $row->Smeknamn . " - " . $row->Utrustning . " - " . $row->Fodd . "<br/>";
      $i++;
    }

    $res->close(); 


    // ----------------------------------------------------------------------------
    //
    // Close the connection to the database
    //
    // http://php.net/manual/en/mysqli.close.php
    //
    $mysqli->close(); 

}

// -------------------------------------------------------------------------------------------
//
// Create and print out the html-page
//
//require_once('common.php');
$title         = "Kompis-sök";
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
    </head>
    <body>
    
        {$html}
        
    </body>
</html>
EOD;

header("Content-Type: application/xhtml+xml; charset={$charset}");
echo $html;
exit;





?>
