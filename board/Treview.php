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
	<style>
	a:hover {text-decoration: none}
</style>	
</head>
<body>

	<?php

	session_start();

	$_SESSION["nowBoard"] = "Treview";
	$board = "review";

	?>

	<div class="container" style="margin-top: 80px">

		<div class="row">

			<div class="col-lg-3">

				<h1 class="my-4">Coummunity</h1>
				<div class="list-group">
					<a href="Tboard.php" class="list-group-item">Notice</a>
					<a href="Tquestion.php" class="list-group-item">Q&A</a>
					<a href="Treview.php" class="list-group-item">Review</a>
				</div>

			</div>

			<div class="col-lg-9" style=" margin-top: 40px; width: 100%">
				<div id="carouselExampleIndicators" class="row" data-ride="carousel">
					<div class="carousel-inner" role="listbox">
						<div class="carousel-item active">
							<table class="table table-hover">
								<tr>
									<th>번호</th>
									<th>제목</th>
									<th>작성자</th>
									<th>작성일시</th>
									<th>조회수</th>
								</tr>
						</div>
					</div>
				</div>
			</div>

				<?php

		require_once("TBoardDao.php");
		require_once("../Ttools.php");

		
		$page = requestValue("page"); // 현재 페이지 
		if ($page < 1)
			$page = 1;

		$dao = new TBoardDao();
		//$msgs = $dao->getManyMsgs();
		$startRecord = ($page-1)*10;
		$msgs = $dao->getPageMsgs("review",$startRecord, 10);
		
		?> 
		<?php foreach($msgs as $msg) : ?>
			<tr>
				<td><?= $msg["Num"] ?> </td>			    
				<td><a href="Tview.php?num=<?= $msg["Num"] ?>&page=<?= $page?>"> <?= $msg["Title"] ?> </a> </td>
				<td><?= $msg["Writer"] ?> </td>
				<td><?= $msg["Regtime"] ?> </td>
				<td><?= $msg["Hits"] ?> </td>
			</tr>
		<?php endforeach ?>	
	</table>	

	<div class="float-right" style="margin-right:50px">	
		<button class="btn btn-primary" onclick="location.href='Twrite_form.php'">글쓰기</button>
	</div>
	<?php
	$numPageLinks = 10; // 한 페이지에 출력할 페이지 링크의 수 
	$numMsgs = 10; // 한 페이지에 출력할 게시글 수 
	$startPage = floor(($page-1)/$numPageLinks)*$numPageLinks+1;
	$endPage = $startPage + ($numPageLinks-1);
    $count = $dao->getTotalCount(); // 전체 게시글 수 
    $totalPages = ceil($count/$numMsgs);
    if($endPage > $totalPages)
    	$endPage = $totalPages;
    ?>
    <?php if($startPage > 1) : ?>
    	<a href="Tboard.php?page=<?= $startPage - $numPageLinks ?>"> 
    		&lt; 
    	</a>
    <?php endif ?>

    <?php for($i=$startPage; $i <= $endPage; $i++) : ?>
    	<a href="Tboard.php?page=<?= $i ?>"> 
    		<?php if($i==$page) :?>
    			<b>
    				<?= $i ?> 
    			</b>
    		<?php else :?>
    			<?= $i ?>	
    		<?php endif ?>
    	</a> 

    <?php endfor ?>    

    <?php if ($endPage < $totalPages) : ?>
    	<a href="Tboard.php?page=<?=$endPage+1?>">
    		&gt;
    	</a>	
    <?php endif ?>	
</div>
</div>
</div>
</div>
</div>
</div>



</body>

  <?php 
  require_once("C:/xampp/htdocs/201802/Term/homepage/Footer_fixed.php" ); 
  ?>

</html>