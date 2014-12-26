<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        include("dbLib.php");
        $id = abs((int)$_POST['id']);
        $title = clearStr($_POST['title']);
        $price = floatval(clearStr($_POST['price']));
        $descr = clearStr($_POST['descr']);
        $userId = $_COOKIE['userId'];
        $dt = time();
        
        if (isUserExist($userId)){
            return;
        }
        redactItem($id, $title, $price, $descr, $dt);
        return;
    }
    
    function isValidDataInForm($id, $title, $price, $descr){
        if($id || !$title || !$price || !$descr)
            return false;
        return true;
    }
?>