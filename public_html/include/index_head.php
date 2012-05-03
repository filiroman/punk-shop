<?php
	session_start();
?>

<div id="header">
		<div id="logo">
			<a href="index.php"><img id="logo_img" src="img/logo.png"/><a>
			<h1>Доска объявлений студгородка</h1>
		</div>
		<?php 
			if(isset($_SESSION['id'])){
				include "user_bar.php";
			} else {
				include "auth.php";
			}
		?>
	</div>
