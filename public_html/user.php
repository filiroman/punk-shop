<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/reset.css"/>
	<link rel="stylesheet" type="text/css" href="css/index.css"/>
	<link rel="stylesheet" type="text/css" href="css/user.css"/>
</head>

<body>
	<?php 
	$auth=false;
	include "/include/header.php" ?>
	
	<div id="main">
	
		<?php include "/include/search+categor.php" ?>
		
		<div id="user">
			<img src="img/pic.png">
			<p id="user_name">user name</p>
			<p id="user_contacts">contacts</p>
			<p id="user_description">some describing text</p>
		</div>


	</div>
	
	<?php include "/include/footer.php" ?>

</body>


</html>