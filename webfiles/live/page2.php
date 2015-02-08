<?PHP

include_once('inc\settings.php');

$clean_Meta = strtolower(preg_replace("/[^a-z]+/i", "-",  $_GET['inputBox']));

$SQL = "SELECT i.Title, i.Description, i.id
		FROM item AS i
		 JOIN meta_link as ml on ml.item_id = i.id
		 JOIN meta as m on m.meta_id = ml.item_id
		WHERE m.meta_desc = '".$clean_Meta."'";


?>
<!doctype html>
<html>
<head>
<meta  http-equiv="Content-Type" content="text/html; charset="utf-8">
 
<meta name="description" content="a collection of databases"/>
<meta name="keywords" content=""/>
<meta name="author" content="Clockwise"/>
<meta name="robots" content="index, follow"/>
<title>clockwise search for <?php echo $clean_Meta; ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
 
<?PHP
try {
    $dbh = new PDO('mysql:host=localhost;dbname=meta', $DB_USER, $DB_PASS);
    foreach($dbh->query($SQL) as $row) {
            echo '<h1><a href="page3.php?id='.$row['id'].'">'.$row['Title'].'</a></h1>';
    	    echo '<h2>&ensp;&ensp;'.$row['Description'].'</h2>';
            echo '&ensp;';
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}


?>





</body>
</html>
