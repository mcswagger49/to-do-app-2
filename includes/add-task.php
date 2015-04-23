<?php
	$task = strip_tags($_POST['task']);
	$date = date('Y-m-d');
	$time = date('H:i:s');

	include ('connect.php');

	$mysqli = new mysqli('localhost', 'root', 'root', 'todo');
	$mysqli ->query("INSERT INTO tasks VALUES ('', '$task', '$date', '$time')");

	$query = "SELECT * FROM tasks WHERE task='$task' and date='$date' and time='$time' ";


?>