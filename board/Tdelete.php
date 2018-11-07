<?php
	/*
	클라이언트가 넘겨준 게시글 번호를 받아서
   1번에서 구현한 delete 메소드를 호출해 레코드를 삭제
   다시 board.php로 돌아간다.
	*/
   session_start();
   $nowBoard = isset($_SESSION["nowBoard"])?($_SESSION["nowBoard"]):"";
   
   require_once("../Ttools.php");
   require_once("TBoardDao.php");

   $num = requestValue("num");

	$dao = new TBoardDao();
 
 	if($nowBoard == "Tquestion"){
            $dao -> deleteMsg("question",$num);
        } else if($nowBoard == "Treview"){
            $dao -> deleteMsg("review", $num);
        } else if($nowBoard == "Tboard"){
            $dao -> deleteMsg("term", $num);
        }

   okGo("게시글이 삭제 되었습니다 ! ","Tboard.php");
  
   header("Location: Tboard.php"); 
?>