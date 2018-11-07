<?php
	/*
		회원정보를 수정할 수 있는 폼 페이지를 만들어 준다. 
	*/

?>

<!DOCTYPE html>
<html>
<head>
		<?php 
 	require_once("C:/xampp/htdocs/201802/Term/homepage/Nav.php"); 
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
<?php
	require_once("MemberDao.php");
	/*
		이 회원정보 수정 요청을 한 사용자의 원래 정보를 어떻게 알지?

	*/
		session_start();

		$uid = $_SESSION["uid"];

		/* uid를 가지고 데이터베이스 질의해야지... 이 id를 가진 회원정보를 가져오라고 */

		$mdao = new MemberDao();
		$member = $mdao->getMember($uid);
		if(!$member) {
			errorBack("그런 사람은 없습니다.");
			exit();
		}

?>	

<div class="container" style="margin-top: 70px;">
  <h2>회원정보수정</h2>
  <p>회원정보 수정을 위해 아래의 모든 정보를 작성해 주세요. </p>
  <form action="update.php" method="post">
    <div class="form-group">
      <label for="usr">Id:</label>
      <input type="text" class="form-control" readonly 
      value="<?= $member["id"] ?>"
      id="usr" name="id">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="pw" value ="<?= $member["pw"] ?>">
    </div>
     <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" name="name" value="<?= $member["name"] ?>">
    </div>   
          <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="text" class="form-control" id="phone" name="phone" value ="<?= $member["phone"] ?>">
      </div>
      <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" class="form-control" id="address" name="address" value ="<?= $member["address"] ?>">
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>	
	
</body>


	<?php 
 	require_once("C:/xampp/htdocs/201802/Term/homepage/Footer.php" ); 
  	?>

</html>