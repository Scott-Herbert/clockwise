<?php

$clean_Meta = $_GET['meta'];

$DB_HOST = 		'localhost';
$DB_DB = 		'meta';
$DB_USER = 		'root';
$DB_PASSWORD = 		'PaladinSoft';


// find desc + meta data items
$SQL = "SELECT i.Title, i.Description, m.meta_desc

	From item as i
		join meta_link as ml on ml.item_id = i.id 
		join meta as m on m.meta_id = ml.item_id

 where i.id = " . $clean_Meta;

echo $SQL;

// Perform Query


$link = mysql_connect ($DB_HOST, $DB_USER, $DB_PASSWORD) or die (mysql_error());

mysql_select_db ($DB_DB);

$result = mysql_query($QL);

$ma = array();

//while ($row = mysql_fetch_assoc($result)) {

//	if isset ($ma[$row['meta_desc']]) {
//		$ma[$row['meta_desc']] = $ma[$row['meta_desc']] + 1;
//	} else {
//		$ma[$row['meta_desc']] = 1;
//	}

//}



arsort($ma);

$item1 = pop($ma);
$item2 = pop($ma);
$item3 = pop($ma);


$SQL = "SELECT i.Title, i.Description From meta as m
		join meta_link as ml on ml.meta_id = m.item_id
		join item as i on i.id = ml.link.id
WHERE ml.item_desc IN ( '".$item1."' , '".$item2."', '".$item3."' ) ";



$result = mysql_query($QL);

while ($row = mysql_fetch_assoc($result)) {
	echo $row['Title'] . ' - ' . $row['Description'] . '</br>';
}


?>
