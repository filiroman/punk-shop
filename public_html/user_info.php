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
	include "include/index_head.php" ?>
	
	<div id="main">
	
		<?php include "include/search_categories.php" ?>
		
		<div id="user">
			<img src="img/pic.png">
			<p id="user_name">user name</p>
			<p id="user_contacts">contacts</p>
			<p id="user_description">some describing text</p>
		</div>


	</div>
	
	<?php include "include/index_foot.php" ?>

</body>


</html>
