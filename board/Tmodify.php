<?php
	/*
		1. DAO와 공통모듈 파일을 include 한다. 
		2. form에서 넘겨준 값을 추출한다. 
		   content, title, num, writer
		3. 모든 값이 넘어 왔으면 
			$dao 변수에 DAO객체를 생성 할당한 후에
			$dao에게 그 값을 넘겨주고 update 요청한다. 
		4. 성공했으면 board 페이지로 이동
	*/
	require_once("TBoardDao.php");
	require_once("../Ttools.php");

	session_start();
	$nowBoard = isset($_SESSION["nowBoard"])?($_SESSION["nowBoard"]):"";

	$dao = new TBoardDao();
	$content = requestValue("content");	
	$title = requestValue("title");
	$num = requestValue("num");
	$writer = requestValue("writer");
	$loginFlag = isLogin();
    $myArticle = isMyArticle($writer);
    
    if ($loginFlag == false || $myArticle == false) {
        errorBack("권한이 없습니다");
        exit();
    }

	if($content && $title && $writer) {
		if($nowBoard == "Tquestion"){
            $dao -> updateMsg("question", $num, $title, $writer, $content);
        } else if($nowBoard == "Treview"){
            $dao -> updateMsg("review", $num, $title, $writer, $content);
        } else if($nowBoard == "Tboard"){
            $dao -> updateMsg("term", $num, $title, $writer, $content);
        }
		okGo("게시글이 수정되었습니다", "Tboard.php");
	} else {
		errorBack("모든 항목이 빈칸 없이 입력되어야 합니다.");
	}
?>