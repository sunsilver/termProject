<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		// 1. Request에서 id와 password 값이 있는지 check...
		// 2 있으면 
		//	2.1 id와 password를 검사...
		//  2.2 id와 password가 일치하면 
		//    2.2.1 ~님 환영합니다. 로그아웃버튼 출력 
		// 3. id와 password 값이 없거나 일치하지 않으면
		// 3.1 로그인 폼 출력 

		$id = isset($_REQUEST["id"])?$_REQUEST["id"]:"";
		$pw= isset($_REQUEST["pw"])?$_REQUEST["pw"]:"";
		$flag = true;
		if ($id && $pw){
			if ($id=="scpark" && $pw=="9701234") {
				$flag = false;
				echo $id, "님 환영합니다.<br>";
				echo "<button>로그아웃</button>";
			}
		}		

		if ($flag) {
	?>	
		<form>	
			아이디: <input type="text" name="id"> <br>
			암호: <input type="password" name="pw"> <br>
			<input type="submit" value="로그인"> <br>
		</form>	
	<?php
		}
	?>
				
	
	
</body>
</html>