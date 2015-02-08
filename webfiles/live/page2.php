<?PHP

$clean_Meta = strtolower(preg_replace("/[^a-z]+/i", "-",  $_GET['inputBox']));

$DB_HOST = 		'localhost';
$DB_DB = 		'meta';
$DB_USER = 		'root';
$DB_PASSWORD = 		'PaladinSoft';


$SQL = "SELECT i.Title, i.Description, i.id
		FROM item AS i
		 JOIN meta_link as ml on ml.item_id = i.id
		 JOIN meta as m on m.meta_id = ml.item_id
		WHERE m.meta_desc = '".$clean_Meta."';"
echo $SQL;

// Perform Query


$link = mysql_connect ($DB_HOST, $DB_USER, $DB_PASSWORD) or die (mysql_error());

mysql_select_db ($DB_DB);

$result = mysql_query($QL);

$ma = array();

?>
<!doctype html>
<html>
<head>
<meta  http-equiv="Content-Type" content="text/html; charset="utf-8">
 
<meta name="description" content="a collection of databases"/>
<meta name="keywords" content=""/>
<meta name="author" content="Clockwise"/>
<meta name="robots" content="index, follow"/>
<title>clockwise</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
 
<div id="box">

<?PHP

if (mysql_affected_rows() <> 0) then {

	while ($row = mysql_fetch_assoc($result)) then {

		echo "<h1><a href='page3.php?id=".$row['id']."'>".$row['title']."</a></h1>";
		echo "<h2>&ensp;&ensp;".$row['Description']."</h2>";
		echo "&ensp;";
	}

} else {
	echo "Sorry their are no results for " . $clean_Meta;
}


?>




</div>


</body>
</html>
