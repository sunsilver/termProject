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
  require_once("../Ttools.php");
  
  session_start();
  if(isset($_SESSION['uid'])){
          echo "<script>alert('로그아웃 후에 이용하세요.')</script>";
          goNow(MAIN_PAGE);
        }
  ?>

  <div class="container" style="margin-top: 70px">
    <h2>회원가입</h2>
    <p>회원가입을 위해 아래의 모든 정보를 작성해 주세요. </p>
    <form action="member_join.php" method="post" style="margin-bottom: 150px">
      <div class="form-group">
        <label for="usr">Id:</label>
        <input type="text" class="form-control" id="usr" name="id">
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" name="pw">
      </div>
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name">
      </div>   
      <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="text" class="form-control" id="phone" name="phone">
      </div>
      <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" class="form-control" id="address" name="address">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>	

</body>

  <?php 
  require_once("C:/xampp/htdocs/201802/Term/homepage/Footer_fixed.php" ); 
  ?>

</html>