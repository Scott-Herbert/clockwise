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

<script>
$("#inputBox").keyup(function(event){
    if(event.keyCode == 13){
        $("#inputBox").click();
    }
});
</script>

</head>
<body>
<p>What do you want to know about?</p>
<form action="page2.php" methord="get">
	<input type="text" placeholder="Item to look up..." id="inputBox" name="inputBox"/>
</form>

</body>
</html>
