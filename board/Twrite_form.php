<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">

	<style>
	table  { width: 100%; text-align: center; }
	th     { background-color: lightgray; }

	.left  { text-align: left;  }        
	.right { text-align: right; }

	a:hover { text-decoration: none; color: red;  }
	</style>

	<?php
	require("WebhardDao.php");
	$dao = new WebhardDao();

	$sort = isset($_REQUEST["sort"]) ? $_REQUEST["sort"] : "fname";
	$dir  = isset($_REQUEST["dir"])  ? $_REQUEST["dir"]  : "asc";

	$result = $dao->getFileList($sort, $dir);
	?>			
	</head>
	<body>
	
	<?php
	session_start();
	$id = isset($_SESSION["uid"])?($_SESSION["uid"]):""; 
	?>
	<div class="jumbotron">
		<h1> 글 등록 폼</h1>
	</div>
	<form action="Twrite.php" method="post">

		<div class="form-group">
			<label for="title">제목: </label>
			<input type="text" id="title" name="title" class="form-control" required>
		</div>
		
		<div class="form-group">
			<label for="writer">작성자: </label>
			<input type="text" id="writer" name="writer" class="form-control" value="<?= $id ?>" readonly required>
		</div>
		
		<div class="form-group">
			<label for="content">내용: </label>
			<textarea rows="5" id="content"
			name="content" class="form-control" required></textarea>
		</div>
		<script>/*
	<form action="add_file.php?sort=<?= $sort ?>&dir=<?= $dir ?>" 
      enctype="multipart/form-data" method="post">
    업로드할 파일을 선택하세요.<br>
    <input type="file" name="upload"><br>
    <input type="submit" value="업로드">
	</form>
<br>

<table>
    <tr>
        <th>파일명
            <a href="?sort=fname&dir=asc">^</a>
            <a href="?sort=fname&dir=desc">v</a>            
        </th>
        <th>업로드
            <a href="?sort=ftime&dir=asc">^</a>
            <a href="?sort=ftime&dir=desc">v</a>            
        </th>
        <th>크기</th>
        <th>삭제</th>
    </tr>
    <?php foreach ($result as $row) : ?>
    <tr>
        <td class="left"><a href="files/<?= $row["fname"] ?>"><?= $row["fname"] ?></a></td>
        <td><?= $row["ftime"] ?></td>
        <td class="right"><?= $row["fsize"] ?>&nbsp;&nbsp;</td>
        <td><a href="del_file.php?num=<?= $row["num"] ?>&sort=<?= 
                     $sort ?>&dir=<?= $dir ?>">X</a></td>
    </tr>
    <?php endforeach ?>
</table>
*/</script>


			<button type="submit" class="btn btn-primary">글등록</button>	
			<button onclick="location.href='Tboard.php'" class="btn btn-danger">목록보기</button>
</form>

	</body>
	</html>