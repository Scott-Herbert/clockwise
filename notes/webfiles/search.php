<?php

$Dirty_Meta = $_GET['meta'];
$clean_meta = preg_replace('/[^0-9]/i', '', $Dirty_Meta);

echo $clean_meta;

$DB_HOST = 		'localhost';
$DB_DB = 		'meta';
$DB_USER = 		'root';
$DB_PASSWORD = 		'PaladinSoft';

$SQL = "SELECT * FROM link WHERE meta LIKE '%" . $clean_meta . "%'";

// Perform Query
$result = mysql_query($query);

// Check result
// This shows the actual query sent to MySQL, and the error. Useful for debugging.
if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}

// Use result
// Attempting to print $result won't allow access to information in the resource
// One of the mysql result functions must be used
// See also mysql_result(), mysql_fetch_array(), mysql_fetch_row(), etc.
while ($row = mysql_fetch_assoc($result)) {
    echo $row['title'] . " - " . $row['Desc'];
}

// Free the resources associated with the result set
// This is done automatically at the end of the script
mysql_free_result($result);
?>
