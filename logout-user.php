<?php
	require_once(__DIR__ . "/php/model/config.php");

	unset($_SESSION["authenticated"]);

	session_destroy();
	header("Location: " . $path . "index.php");

?>