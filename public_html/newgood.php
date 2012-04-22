 <!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/reset.css"/>
	<link rel="stylesheet" type="text/css" href="css/index.css"/>
	<link rel="stylesheet" type="text/css" href="css/newgood.css"/>
</head>

<body>
	<?php 
	$auth=true;
	include "/include/header.php" ?>
	
	<div id="main">
	
		<?php include "/include/search+categor.php" ?>
		
		<div id="good">
			
			<form method="post" action="postgood.php">
				<input name="title" type="text" placeholder="title"><input name="price" type="text" placeholder="price"><br>
				<textarea id="description" name="description" type="text" placeholder="description"></textarea><br>
				<input name="category" type="text" value="category">
				<input id="btn" type="submit">
			</form>
		</div>
		

	</div>
	
	<?php include "/include/footer.php" ?>
</body>

</html>