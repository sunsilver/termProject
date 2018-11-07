<?php
/*
request 정보에서 id, pw, name 추출
데이터베이스에서 저장된 회원정보 수정
main페이지로 이동
*/
	require_once("../Ttools.php");
	require_once("MemberDao.php");

	session_start();

	$id = requestValue("id");
	$pw = requestValue("pw");
	$name = requestValue("name");
	$address = requestValue("address");
	$phone = requestValue("phone");
	/*
	1.로그인 한 사용자인지 check
	2.로그인 한 사용자 본인의 회원정보를 수정하려는 것인지 check
	*/

	$suid = isset($SESSION["uid"])?$_SESSION["uid"]:"";

	if($id && $pw && $name && $address && $phone) {
		$mdao = new MemberDao();
		$mdao->updateMember($id, $pw, $name, $address, $phone);
		$_SESSION["name"] = $name;

		okGo("회원정보가 수정되었습니다.", MAIN_PAGE);
	}else{
		errorBack("모든 입력란을 채워주세요");
	}
?>