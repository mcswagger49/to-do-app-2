<!DOCTYPE html>
<html>
<head>
	<title>Joshua's T-Do List #2</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<div class="wrap">  
		<div class="task-list">
			<ul>
				<?php require("includes/connect.php"); ?>
			</ul>		
		</div>
	<form class="add-new-task" autocomplete="off">
		<input type="text" name="new-task" placeholder="Add new item..."/>
	</form>
	</div>
</body>
</html>