<?php
    require("WebhardDao.php");
    $dao = new WebhardDao();
    
    $sort = isset($_REQUEST["sort"]) ? $_REQUEST["sort"] : "fname";
    $dir  = isset($_REQUEST["dir"])  ? $_REQUEST["dir"]  : "asc";

    $result = $dao->getFileList($sort, $dir);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>TITLE</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8">


  <!-- Font -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">

  <!-- Stylesheets -->
  <link href="/term2/css/bootstrap.css" rel="stylesheet">
  <link href="/term2/css/ionicons.css" rel="stylesheet">
  <link href="/term2/css/layerslider.css" rel="stylesheet">

  <link href="/term2/css/css/styles.css" rel="stylesheet">
  <link href="/term2/css/css/responsive.css" rel="stylesheet">
    <style>
        table  { width: 700px; text-align: center; }
        th     { background-color: cyan; }
        
        .left  { text-align: left;  }        
        .right { text-align: right; }

        a:hover { text-decoration: none; color: red;  }
    </style>

    <link href="/term2/css/css/styles2.css" rel="stylesheet">   
</head>
<body>
    <header>
  </header>

  <br><br><br><br><br><br>
  <br><br><br><br><br><br>
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
        <td class="left"><a href="files/<?= $row["fname"] ?>">
                                  <?= $row["fname"] ?></a></td>
        <td><?= $row["ftime"] ?></td>
        <td class="right"><?= $row["fsize"] ?>&nbsp;&nbsp;</td>
        <td><a href="del_file.php?num=<?= $row["num"] ?>&sort=<?= 
                     $sort ?>&dir=<?= $dir ?>">X</td>
    </tr>
    <?php endforeach ?>
</table>

<!-- SCRIPTS -->

  <script src="/term2/js/jquery-3.1.1.min.js"></script>

  <script src="/term2/js/tether.min.js"></script>

  <script src="/term2/js/bootstrap.js"></script>

  <script src="/term2/js/layerslider.js"></script>

  <script src="/term2/js/scripts.js"></script>
</body>
</html>  