<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        include("dbLib.php");
        $title = clearStr($_POST['title']);
        $price = floatval(clearStr($_POST['price']));
        $descr = clearStr($_POST['descr']);
        $userId = $_COOKIE['userId'];
        $dt = time();
        
        if (!isValidDataInForm($title, $price, $descr) && isUserExist($userId)){
            return;
        }
        addItem($userId, $title, $price, $descr, $dt);
        return;
    }
    
    function isValidDataInForm($title, $price, $descr){
        if(!$title || !$price || !$descr)
            return false;
        return true;
    }
?>