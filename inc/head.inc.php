<?php
    header("Content-type: text/html; charset=utf-8");
    include ("inc/dbLib.php");
    session_start();
    if (!empty($_GET['page']))
        $page = $_GET['page'];
    if(!empty($_COOKIE['userName']) && !empty($_COOKIE['userId']) && isUserExist($_COOKIE['userName'])){
        $validUserName = $_COOKIE['userName'];
        $validUserId = $_COOKIE['userId'];
    }

    switch($page){
        case 'registr': $title = "Регистрация нового пользователя"; break;
        case 'additem': $title = "Добавление нового товара"; break;
        
        default: $title = "Товары";
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Testwork - <?php echo $title?></title>
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/lib.js" type="text/javascript"></script>
</head>
<body>