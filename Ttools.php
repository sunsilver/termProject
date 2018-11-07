<?php
define("MAIN_PAGE", "/201802/Term/homepage/index.php");

	//해당 값이 정의되지 않았으면 빈 문자열을 반환
function requestValue($name) {
	return isset($_REQUEST[$name])?$_REQUEST[$name]:"";
}

	//경고창에 오류 메세지를 출력하고 이전 페이지로 돌아가는 함수
function errorBack($msg) {
	?>
	<script>
		alert('<?= $msg ?>');
		history.back();
	</script>	

	<?php	
	exit();
}

	//경고창에 지정된 메세지를 출력하고 지정된 페이지로 이동하는 함수
function okGo($msg, $url) {
	?>
	<script>
		alert('<?= $msg ?>');
		location.href = '<?= $url ?>';
	</script>

	<?php
	exit();

}

	//지시된 URL로 이동하는 함수
function goNow($url) {
	?>
	<script>				
		location.href = '<?= $url ?>';
	</script>

	<?php
	exit();

}

	function sessionStartIfNone(){
		if(session_status() == PHP_SESSION_NONE)
		session_start();
	}

	function isLogin(){//로그인 했을때만 수정 삭제 가능
		return isset($_SESSION["uid"]);

	}

	function isMyArticle($writer){//로그인 한 아이디와 작성자가 같아야 수정 삭제 가능
		
		if(isset($_SESSION["uid"])){
			return ($writer == $_SESSION["uid"]);
		}
	}

	function readSessionVar($uid){//uid라는 매개변수에 uid라는 세션을 가져온다.
		if(session_status() ==PHP_SESSION_NONE){
			session_start();

		}
		return isset($_SESSION[$uid])?$_SESSION[$uid]:"";//uid가 있는지 확인하고 반환해준다.
	}



	?>
