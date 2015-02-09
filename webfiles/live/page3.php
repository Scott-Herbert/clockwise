<?php

include_once('inc\settings.php');

$clean_Meta = (int)$_GET['id'];

$SQL = "SELECT i.Title, i.Description, i.id, i.JSON FROM item AS i WHERE i.id = " . $clean_Meta;

$Title = "";
$Desc = "";
$ID = "";
$JSON = "";

try {
    $dbh = new PDO('mysql:host=localhost;dbname=meta', $DB_USER, $DB_PASS);
    foreach($dbh->query($SQL) as $row) {
	$Title = $row['Title'];
	$Desc = $row['Description'];
	$id = $row['id'];
	$JSON = $row['JSON'];
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?><!doctype html>
    <html>
    <head>
    <meta  http-equiv="Content-Type" content="text/html; charset="utf-8">
     
    <meta name="description" content="a collection of databases"/>
    <meta name="keywords" content=""/>
    <meta name="author" content="Clockwise"/>
    <meta name="robots" content="index, follow"/>
    <title>page3</title>
    <link href="style.css" rel="stylesheet" type="text/css">
     
    </head>
     
    <body>
     
    <h1><?php echo $title; ?></h1>
    <h2>&ensp;&ensp;<?php echo $Desc; ?></br><?php echo $JSON; ?></h2>

    <div id="map">
     <img src="http://placehold.it/300x200" />
    </div>
	<div id="clear"></div>
    </hr>
    <h2>The following other search terms may be of intrest to you</h2>
<?php

// to do add a meta search engion here
//
// Five minite job....


// use id to get a list of meta id's

$SQL = "SELECT meta_desc from meta_link as ml join meta as m on ml.meta_id = m.meta_id where ml.item_id = " . $clean_Meta;

// List them here (with a link to page 2)
try {
    $dbh = new PDO('mysql:host=localhost;dbname=meta', $DB_USER, $DB_PASS);
    foreach($dbh->query($SQL) as $row) {
	echo "<h3><a href='page2.php?inputBox=".$row['meta_desc']."'>".$row['meta_desc']."</a></h3>";
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}


?>
    </body>
    </html>


