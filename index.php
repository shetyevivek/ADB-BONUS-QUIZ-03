<?php

if($_POST)
{
	$name = $_POST['name'];
	$comment = $_POST['comment'];
	$handle = fopen("Vivek.txt", "a");
	fwrite($handle, "<b><i>" .$name. "</i></b>:<br>" .$comment. "<br><br>");
	fclose($handle);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Comments Test</title>
	<meta charset="utf-8">
</head>
<body>
	<h1>Post a comment</h1>
	<form action="" method="POST">
		Name : <br><input type="text" name="name"><br>
		Comment: <br><textarea rows="10" cols="30" name="comment"></textarea><br>
		<input type="submit" name="Post comment">
	</form>
	<hr>
	<h1>Other comments:</h1><br>
	<?php
	$name = "Vivek";
	include 'Vivek.txt';
	?>
</body>
</html>