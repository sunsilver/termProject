<?php
	require_once("../Ttools.php");
	
	session_start();

	unset($_SESSION["uid"]);
	unset($_SESSION["name"]);

	goNow(MAIN_PAGE);

?>