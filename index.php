<!DOCTYPE html>
<html>
<head>
	<title>Joshua's T-Do List #2</title>
		<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  	<link rel="stylesheet"  media="screen and (min-width: 0px)" href="css/small.css">
    <link rel="stylesheet"  media="screen and (min-width: 1000px)" href="css/medium.css">
    <link rel="stylesheet"  media="screen and (min-width: 1400px)" href="css/large.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
</head>
<body>
<a class="btn btn-primary" href="login.php">Login</a>
<div class="text-right small-4 medium-2 columns">
<a class="btn btn-primary" href="logout-user.php">Logout</a>
</div>
<a class="btn btn-primary" href="register.php">Register</a>
	<div class="wrap">  
		<div class="task-list">
			<ul>
				<?php require("includes/connect.php"); 
			$mysqli = new mysqli('localhost', 'root', 'root', 'todo');
			$query = "SELECT * FROM tasks ORDER BY date ASC, time ASC";
			if ($result =$mysqli->query($query)) {
				$numrows = $result->num_rows;
				if ($numrows>0) {
					while ($row = $result->fetch_assoc()) {
						$task_id = $row['id'];
						$task_name =$row['task'];

						echo '<li>
						<span>'.$task_name. '</span>
						<img id="'.$task_id.'" class="delete-button" width="10px" src="images/close.svg"/>
						</li>';
					}
				}
			}
			?>
			</ul>		
		</div>
	<form class="add-new-task" autocomplete="off">
		<input type="text"align="center" name="new-task" placeholder="Add new item..."/>
	</form>
	</div>
</body>
	<script src="https://code.jquery.com/jquery-latest.min.js"></script>
	<script>
	add_task(); //calling the add task function

	function add_task(){
		$('.add-new-task').submit(function() {
			var new_task = $('.add-new-task input[name=new-task]').val();

			if (new_task != '') {
				$.post('includes/add-task.php', {task: new_task}, function(data) {
				  $('add-new-task input[name=new-task]').val();
					$(data).appendTo('.task-list ul').hide().fadeIn();		
				});
			}
			return false;
		});
	}

		$('.delete-button').click(function(){
		var current_element = $(this);
		var task_id = $(this).attr('id');

		$.post('includes/delete-task.php', {id: task_id}, function() {
		current_element.parent().fadeOut("fast", function(){
			$(this).remove();
		});
	  });
	});
	</script>
<?php
require_once(__DIR__ . "/php/controller/login-verify.php");
require_once(__DIR__ . "/php/view/header.php");
if(authenticateUser()){
require_once(__DIR__ . "/php/view/navigation.php");
}
require_once(__DIR__ . "/php/controller/create-db.php");
require_once(__DIR__ . "/php/view/footer.php");
require_once(__DIR__ . "/php/controller/read-posts.php");
?>

</html>