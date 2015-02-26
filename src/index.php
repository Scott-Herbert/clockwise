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
<script src="http://code.jquery.com/jquery-2.1.3.js"></script>
<script type="text/javascript" src="jpopit.jquery.js"></script>
<script>
$("#inputBox").keyup(function(event){
    if(event.keyCode == 13){
        $("#inputBox").click();
    }
});
</script>

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
	echo '<body OnLoad=\'$.spro.jpopit("You\'re searches maybe being monitored, please use <a href=\'https://www.torproject.org/\'>tor</a> or <a href=\'https://tails.boum.org/\'>Tails</a> to prevent it.", false, "left");';
} else {
	echo '<body>';
}

?>
<p>What do you want to know about?</p>
<form action="page2.php" methord="get">
	<input type="text" placeholder="Item to look up..." id="inputBox" name="inputBox"/>
</form>

</body>
</html>
