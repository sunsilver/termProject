<?php
    require("WebhardDao.php");
    $dao = new WebhardDao();
            
    $file_name = $dao->deleteFileInfo($_REQUEST["num"]);
    unlink("files/$file_name");
    
    header("Location: webhard.php?sort=$_REQUEST[sort]" 
                               . "&dir=$_REQUEST[dir]");
?>