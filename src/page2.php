<?PHP

require_once("inc/settings.php");

$clean_Meta = strtolower(preg_replace("/[^a-z]+/i", "-",  $_GET['inputBox']));

$SQL = "SELECT i.Title, i.Description, i.id from meta_link as ml
	JOIN meta as m on ml.meta_id = ml.meta_id
	join item as i on ml.item_id = i.id
 where m.meta_desc = '".$clean_Meta."'";


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
<script type="text/javascript" src="jpopit.jquery.js"></script>

<?PHP
function IsTorExitPoint(){
	if (gethostbyname(ReverseIPOctets($_SERVER['REMOTE_ADDR']).".".$_SERVER['SERVER_PORT'].".".ReverseIPOctets($_SERVER['SERVER_ADDR']).".ip-port.exitlist.torproject.org")=="127.0.0.2") {
		return true;
	} else {
		return false;
	} 
}
function ReverseIPOctets($inputip){
	$ipoc = explode(".",$inputip);
	return $ipoc[3].".".$ipoc[2].".".$ipoc[1].".".$ipoc[0];
}

if ( IsTorExitPoint() ) {
        ?>
        </head>
        <body>
        <?php

} else {
        ?>
        </head>
        <body>
        <div style="Background-color:red;color:white;text-align:center;"><h1>You're searches maybe being monitored, please use <a href='https://wwwtorproject.org/'>tor</a> or <a href='https://tails.boum.org/'>tails</a> to protect yourself$
        <?php
} 


?>
 
<?PHP
try {
    $dbh = new PDO('mysql:host=localhost;dbname=meta', $DB_USER, $DB_PASSWORD);
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
