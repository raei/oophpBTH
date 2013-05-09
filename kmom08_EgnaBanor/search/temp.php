
<?php
// ------------------------------------------------------------------------
//
// Prepare and perform a SELECT query
//
// http://php.net/manual/en/mysqli.query.php
// http://php.net/manual/en/mysqli.real-escape-string.php
// http://php.net/manual/en/mysqli.error.php
// http://php.net/manual/en/mysqli-result.num-rows.php
//
// Sanitize data
$search = $mysqli->real_escape_string($_GET['search']);
// Prepare query
$query = "SELECT * FROM Cars WHERE nameCars LIKE '%{$search}%' OR modelCars LIKE '%{$search}%';";
if(empty($search)) {
  echo "Nothing to search for. Exiting...";
  exit;
}
// Execute query
$res = $mysqli->query($query) 
  or die("Could not query database, query =<br/><pre>{$query}</pre><br/>{$mysqli->error}");
echo "<p>Query={$query}</p><p>Number of rows in resultset: " . $res->num_rows . "</p>";

// ------------------------------------------------------------------------
//
// Show the results of the query
//
// http://php.net/manual/en/mysqli-result.fetch-object.php
// http://php.net/manual/en/mysqli.close.php
//
$i = 1;
while($row = $res->fetch_object()) {
  echo $i . ": " . $row->idCars . " - " . $row->nameCars . " - " . $row->modelCars . " - " . $row->readyCars . " - " . $row->hoursCars . "<br/>";
  $i++;
}
$res->close();

// ------------------------------------------------------------------------
//
// Close the connection to the database
//
// http://php.net/manual/en/mysqli.close.php
//
$mysqli->close();

