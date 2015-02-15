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
<script type="text/javascript" src="jpopit.jquery.js"></script>
</head>
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

if (IsTorExitPoint()) {
	echo '<body OnLoad='$.spro.jpopit("You're searches maybe being monitored, please use <a href=\'https://www.torproject.org/\'>tor</a> or <a href=\'https://tails.boum.org/\'>Tails</a> to prevent it.", false, "left");';
} else {
	echo '<body>';
}

?>
 
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
