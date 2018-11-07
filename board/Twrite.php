<?php
	require_once("../Ttools.php");
	require_once("TBoardDao.php");

	session_start();
	$nowBoard = isset($_SESSION["nowBoard"])?($_SESSION["nowBoard"]):"";
	
	$title = requestValue("title");
	$writer = requestValue("writer");
	$content = requestValue("content");
	$dao = new TBoardDao();

	if($title && $writer && $content){
        if($nowBoard == "Tquestion"){
            $dao -> insertMsg("question",$title, $writer, $content);
        } else if($nowBoard == "Treview"){
            $dao -> insertMsg("review",$title, $writer, $content);
        } else if($nowBoard == "Tboard"){
            $dao -> insertMsg("term",$title, $writer, $content);
        }
        okGo("글이 등록되었습니다 ! ","$nowBoard.php");
    }else{ // 모든 항목이 채워지지 않았을 경우
        errorBack("모든 항목이 빈칸 없이 입력 되어야 합니다 ! ");
    }


?>