<!DOCTYPE html>
<html>
<head>
	<?php 
 	require_once("C:/xampp/htdocs/201802/Term/homepage/Nav.php"); 

 	session_start();

 	$id = isset($_SESSION["uid"])?($_SESSION["uid"]):"";
 	$name = isset($_SESSION["name"])?($_SESSION["name"]):"";
 	
  	?>

	<meta charset="UTF-8">
	<title>Document</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>	

</head>
<body>
	<div class="container" style="margin-top: 100px" >
		<?php
			if(!($id)){
		?>
		<h2>로그인</h2>
		<form action="login.php" method="post" >
			<div class="form-group">
				<label for="usr">Id:</label>
				<input type="text" class="form-control" id="usr" name="id">
			</div>
			<div class="form-group">
				<label for="pwd">Password:</label>
				<input type="password" class="form-control" id="pwd" name="pw">
			</div> 
			<button type="submit" class="btn btn-primary">Login</button>
		
	</form>


	<?php
		}

		else{
	?>
		<h3><?= $name?>님 환영합니다.</h3>
		<button class="btn btn-danger" onclick="location.href='logout.php'">로그아웃</button>
		<button class="btn btn-danger" onclick="location.href='update_form.php'">회원정보 수정</button>
	<?php
		}
	?>

	</div>
</body>

	<?php 
 	require_once("C:/xampp/htdocs/201802/Term/homepage/Footer_fixed.php" ); 
  	?>

</html>
