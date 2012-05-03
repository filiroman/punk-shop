<div id="user_bar">
			<?php
				$hostname = "localhost";
				$username = "root";
				$password = "";
				$dbName = "punk_shop";
				mysql_connect($hostname, $username) or die("Не могу создать соединение");
				mysql_select_db($dbName) or die(mysql_error()); 
				$query = mysql_query("SELECT name FROM users WHERE id='".$_SESSION['id']."' LIMIT 1");
				$data = mysql_fetch_assoc($query);
				mysql_close();
			?>
			<span style="margin: 10px;">Вы зашли как <?php echo $data['name']; ?></span> <!-- временный вывод имени !-->
			<button class="btn" ><a href="user_logout.php">Выйти</a></button></br>
			<button class="btn" ><a href="user_info.php?id=<?php echo $_SESSION['id'];?>">Личный кабинет</a></button>
			<button class="btn" ><a href="item_add.php">Добавить товар</a></button>
		</div>
