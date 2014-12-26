<?php
    if($_SERVER['REQUEST_METHOD'] == "GET" || !empty($_GET['id'])){
        include("dbLib.php");
        if(isUserExist($_COOKIE['userName'])){
            $itemId = abs((int)$_GET['id']);
            deleteItem($itemId);
        }       
    }
    header("Location: http://testwork.com/index.php?page=getmyitem");
?>